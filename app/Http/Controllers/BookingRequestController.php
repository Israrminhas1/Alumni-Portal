<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\BookingRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookingRequestController extends Controller
{
    /**
     * Display a listing of the booking request.
     */
    public function index(Request $request)
    {
        $data = BookingRequest::select('booking_requests.*')
            ->where('ccjpo_id', auth()->user()->ccjpo->id)
            ->with('trainee', 'trainee.user', 'trainee.institute');

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('traineee', function ($row) {
                    return $row->trainee->user->name;
                })
                ->editColumn('institute', function ($row) {
                    return $row->trainee->institute->institute_name;
                })
                ->addColumn('slot', function ($row) {
                    $time1 = Carbon::createFromTimeString($row->start_time);
                    $time2 = Carbon::createFromTimeString($row->end_time);

                    return $time1->diffInMinutes($time2);
                })
                ->rawColumns(['traineee', 'institute', 'slot'])
                ->make(true);
        }

        return view('booking_request.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'availability_id' => 'required|exists:availabilities,id',
            'title' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d',
        ]);

        $availability = Availability::find($request->availability_id);
        BookingRequest::create([
            'availability_id' => $availability->id,
            'ccjpo_id' => $availability->ccjpo_id,
            'trainee_id' => auth()->user()->trainee->id,
            'title' => $request->title,
            'date' => $request->date,
            'start_time' => $availability->start_time,
            'end_time' => $availability->end_time,
            'status' => 'pending',
        ]);

        return response()->json(['success' => true, 'message' => 'Booking request has been sent successfully.']);
    }

    public function approve($id)
    {
        $bookingRequest = BookingRequest::findOrFail($id);
        $bookingRequest->status = 'approved';
        $bookingRequest->save();

        return back()->with('success', 'Booking request has been approved successfully.');
    }
}
