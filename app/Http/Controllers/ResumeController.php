<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\ResumeTemplate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Module;
use Yajra\DataTables\Facades\DataTables;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $resumes = Resume::where('user_id', auth()->id());

        // if ($request->user()->can('admin')) {
        //     $resumes = Resume::withCount(['user']);
        // }

        if ($request->ajax()) {
            return DataTables::of($resumes)
                ->addIndexColumn()
                ->make(true);
        }

        return view('resume.index');
    }

    public function create(ResumeTemplate $template)
    {
        $user = auth()->user();

        return view('resume.create', compact('template', 'user'));
    }

    public function save(Request $request)
    {
        $request->validate(['template_id' => 'required']);

        // Get template ID content and style => load builder
        $template = ResumeTemplate::findorFail($request->template_id);
        $template = replaceVarContentStyle($template);

        $item = Resume::create([
            'user_id' => auth()->id(),
            'resume_template_id' => $request->template_id,
            'job_title' => $request->job_title,
            'summary' => $request->summary,
            'skill' => $request->skill,
            'content' => $template->content,
            'style' => $template->style,
        ]);

        return to_route('resume.builder', ['code' => $item->code]);
    }

    public function builder($code, Request $request)
    {
        $data = Resume::where(['user_id' => auth()->id(), 'code' => $code])->firstOrFail();

        $data = replaceVarContentStyle($data);

        $all_templates = ResumeTemplate::latest()->get();

        $images_url = getAllImagesUser(auth()->id());
        $all_icons = config('app.all_icons');
        $all_fonts = config('app.all_fonts');

        return view('resume.builder', compact('data', 'all_icons', 'all_fonts', 'images_url', 'all_templates'));

    }

    public function updateBuilder($id, Request $request)
    {
        $item = Resume::findOrFail($id);
        $item->content = $request->input('gjs-html');
        $item->style = $request->input('gjs-css');

        if ($item->save()) {
            return response()->json(['success' => 'Updated successfully']);
        }

        return response()->json(['error' => 'Updated failed.']);
    }

    public function loadBuilder($id)
    {
        $item = Resume::findOrFail($id);
        $item = replaceVarContentStyle($item);

        if ($item) {
            return response()->json([
                'gjs-html' => $item->content,
                'gjs-css' => $item->style,
            ]);
        }

        return response()->json(['error' => 'Template not found.']);
    }

    public function clone($id)
    {
        $template = Resume::findorFail($id);
        $item = $template->replicate();
        $item->name = 'Copy '.$template->name;
        $item->save();

        return to_route('resume.index')
            ->with('success', 'You copy the template :name successfully', ['name' => $template->name]);
    }

    public function delete($id)
    {
        $item = Resume::findorFail($id);
        $item->delete();

        return response()->json(['success' => true, 'message' => 'Resume has been deleted successfully.']);
    }

    public function uploadImage(Request $request)
    {
        $$request->validate([
            'files' => 'required|mimes:jpg,jpeg,png,svg|max:20000',
        ]);

        $images = [];
        $imagesURL = [];

        if ($request->hasFile('files')) {
            $file = $request->file('files');

            $name = $file->getClientOriginalName();
            $new_name = $name;
            $file->move(public_path('storage/user_storage/'.$request->user()->id), $new_name);
            $imagesURL[] = URL::to('/storage/user_storage/'.$request->user()->id.'/'.$new_name);
            $images[] = $new_name;
        }

        return response()->json($imagesURL);
    }

    public function deleteImage(Request $request)
    {
        $input = $request->all();
        $link_array = explode('/', $input['image_src']);
        $image_name = end($link_array);
        $path = public_path('storage/user_storage/'.$request->user()->id.'/'.$image_name);

        if (File::exists($path)) {
            File::delete($path);
        }

        return response()->json($image_name);
    }

    public function setting($code, Request $request)
    {
        $item = Resume::where(['user_id' => auth()->id(), 'code' => $code])->firstOrFail();

        return view('resume.setting', compact('item'));
    }

    public function settingUpdate($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|alpha_dash|max:50|unique:resume,slug,'.$id,
        ]);

        $item = Resume::findOrFail($id);
        $item->update($request->validated());

        return back()->with('success', 'Updated successfully');
    }

    public function publish($slug, Request $request)
    {
        $item = Resume::where('slug', $slug)->firstOrFail();

        $check_remove_brand = 1;

        // $user = $request->user();
        // if ($user) {
        //     if (Module::find('Saas')) {
        //         $check_remove_brand = $request->user()->checkRemoveBrand();
        //     }
        // }

        // count view resume
        if ($this->add_count($item->id) == true) {
            $item->view_count += 1;
            $item->save();
        }

        return view('resume.publish', compact('item', 'check_remove_brand'));
    }

    public function download($code, Request $request)
    {
        $item = Resume::where('code', $code)->firstOrFail();

        $check_remove_brand = 1;

        // $user = $request->user();
        // if ($user) {
        //     if (Module::find('Saas')) {
        //         $check_remove_brand = $request->user()->checkRemoveBrand();
        //     }
        // }

        return view('resume.download', compact('item', 'check_remove_brand'));
    }

    public function getPageJson($code, Request $request)
    {
        $item = Resume::where('code', $code)->firstOrFail();

        return response()->json([
            'css' => $item->style,
            'html' => $item->content,
        ]);
    }

    public function add_count($id)
    {
        $cookie_name = 'resume_view_'.$id;

        $check_visitor = Cookie::get($cookie_name);

        $minutes = 7200; // 5 days

        if (! $check_visitor) {
            Cookie::queue($cookie_name, 'viewed', $minutes);

            return true;
        }

        // exits Cookie
        return false;
    }
}
