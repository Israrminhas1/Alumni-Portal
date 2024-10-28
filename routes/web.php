<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingRequestController;
use App\Http\Controllers\CalendarController;
// use App\Http\Controllers\GoogleMeetSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceLibraryController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeTemplateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::redirect('/', '/login');

Route::view('/', 'index')->name('index');
Route::view('about-us', 'pages/about-us')->name('aboutus');
Route::view('contact-us', 'pages/contact-us')->name('contactus');
Route::view('jobs', 'pages/jobs-listing')->name('jobs.listing');
Route::view('career-advisors', 'pages/career-advisors')->name('career.advisors');
Route::view('success-stories', 'pages/success-stories')->name('success.stories');
Route::view('events', 'pages/events')->name('events');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/availabilities/fetch', [AvailabilityController::class, 'fetch'])->name('availabilities.fetch');
    Route::get('/bookings/fetch', [CalendarController::class, 'fetch'])->name('bookings.fetch');
    Route::get('/available-slots', [AvailabilityController::class, 'availableSlot'])->name('available.slot');
    Route::resource('/availabilities', AvailabilityController::class);
    Route::resource('/booking-requests', BookingRequestController::class);
    Route::get('/booking-requests/approve/{id}', [BookingRequestController::class, 'approve'])->name('booking-requests.approve');
    Route::resource('/resources', ResourceLibraryController::class)->only(['index', 'store', 'destroy']);
});

// Route::get('/session-create', [GoogleMeetSessionController::class, 'index']);
Route::view('resume1', 'resume.resume1');


Route::middleware(['auth', 'verified'])->group(function () { // TODO
    // Route::get('/admin', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');
    // Route::resource('admin', DashboardController::class)->names('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ------------------------------------------------------------ Users ---------------------------------------------------------------------------------------
    Route::middleware('role:Admin')->group(function () {
        Route::resource('/users', UserController::class)->only(['index', 'store', 'destroy']);
        Route::resource('/roles', RoleController::class);
    });

    Route::get('templates/{id?}', [ResumeTemplateController::class, 'getAllTemplateThemes'])->name('templates');
    Route::get('publish/{slug}', [ResumeController::class, 'publish'])->name('resume.publish');
    Route::post('get-page-json/{code}', [ResumeController::class, 'getPageJson']);

    Route::middleware('role:Trainee|Alumni')->group(function () {
        Route::get('alltemplates/{id?}', [ResumeTemplateController::class, 'getAllTemplate'])->name('alltemplates');

        Route::prefix('resume')->controller(ResumeController::class)->group(function () {
            Route::get('download/{item}', 'download')->name('resume.download');
            Route::get('/', 'index')->name('resume.index');
            Route::get('builder/{code}/{type?}', 'builder')->name('resume.builder');
            Route::post('save', 'save')->name('resume.save');
            Route::get('{template}/create', 'create')->name('resume.create');

            // Load builder
            Route::post('update-builder/{id}', 'updateBuilder')->name('resume.updateBuilder');
            Route::get('load-builder/{id}', 'loadBuilder')->name('resume.loadBuilder');
            Route::post('clone/{item}', 'clone')->name('resume.clone');
            Route::delete('delete/{item}', 'delete')->name('resume.delete');

            Route::post('uploadimage', 'uploadImage');
            Route::post('deleteimage', 'deleteImage');
            // Route::get('setting/{item}', 'setting')->name('resume.setting');
            Route::post('setting-update/{item}', 'settingUpdate')->name('resume.settings.update');
        });
    });

    // For admin and user
    Route::controller(ResumeTemplateController::class)->group(function () {
        Route::post('resumetemplate/loadtemplate/{id}', 'loadTemplate')->name('loadtemplate');
        Route::post('resumetemplate/uploadimage', 'uploadImage');
        Route::post('resumetemplate/deleteimage', 'deleteImage');
    });

    Route::middleware('role:Admin')->prefix('settings')->name('settings.')->group(function () {
        Route::resource('resume-templates', ResumeTemplateController::class)->only(['index', 'store', 'destroy']);
        Route::get('resume-templates/status/{id}', [ResumeTemplateController::class, 'status'])->name('resume-templates.status');

        Route::controller(ResumeTemplateController::class)->group(function () {
            Route::post('resume-template/uploadimage', 'uploadImage')->name('resume.template.uploadimage');
            Route::post('resume-template/deleteimage', 'deleteImage')->name('resume.template.deleteimage');

            Route::post('resume-template/clone/{id}', 'clone')->name('resume.template.clone');
            // Builder template
            Route::get('resume-template/builder/{id}/{type?}', 'builder')->name('resume.template.builder');

            // Load template builder
            Route::get('resume-template/load-builder/{id}', 'loadBuilder')->name('resume.template.loadBuilder');

            Route::post('resume-template/update-builder/{id}', 'updateBuilder')->name('resume.template.updateBuilder');
        });
    });
});

require __DIR__.'/auth.php';
