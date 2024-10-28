<?php

namespace App\Http\Controllers;

use App\Models\BookingRequest;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar');
    }

    public function fetch()
    {
        $dateRange = CarbonPeriod::create(Carbon::parse(request()->start_date)->startOfWeek(Carbon::SUNDAY), Carbon::parse(request()->end_date)->endOfWeek(Carbon::SATURDAY));
        $meetings = [];

        $bookings = BookingRequest::where('ccjpo_id', auth()->user()->ccjpo->id)->get();

        foreach ($dateRange as $date) {
            foreach ($bookings as $booking) {
                if ($booking->date == $date->format('Y-m-d')) {
                    $meetings[] = [
                        'id' => $booking->id,
                        'title' => $booking->title,
                        'start' => $date->format('Y-m-d').'T'.$booking->start_time, // FullCalendar expects ISO format
                        'end' => $date->format('Y-m-d').'T'.$booking->end_time,
                        'status' => $booking->status == 'pending' ? 'pending' : 'booked',
                        'extendedProps' => [
                            'calendar' => 'Business',
                        ],
                    ];
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Booking has been fetched successfully.', 'data' => $meetings]);
    }
}
