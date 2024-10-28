<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\CCJPO;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:CCJPO-Officer', ['only' => ['store']]);
    }

    public function index()
    {
        return view('availability');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'day_of_week' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $daysOfWeek = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];

        $input['ccjpo_id'] = auth()->user()->ccjpo->id;
        $input['day_of_week'] = array_search($request->day_of_week, $daysOfWeek);

        $availability = Availability::where('ccjpo_id', $input['ccjpo_id'])
            ->where('day_of_week', $input['day_of_week'])
            ->where('start_time', $input['start_time'])
            ->where('end_time', $input['end_time'])
            ->first();

        if (! $availability) {
            $availability = Availability::updateOrCreate([
                'id' => $request->id,
            ], $input);
        }

        return response()->json(['success' => true, 'message' => 'Availability has been '.($availability->wasRecentlyCreated ? 'created' : 'updated').' successfully.']);

    }

    public function fetch()
    {
        if (auth()->user()->hasRole('CCJPO-Officer')) {
            $availabilities = Availability::where('ccjpo_id', auth()->user()->ccjpo->id)->with('bookingRequest')->get();
        } else {
            $availabilities = Availability::where('ccjpo_id', request()->instructor_id)->with('bookingRequest')->get();
        }

        $availabilities = $availabilities->groupBy('day_of_week')->all();
        $dateRange = CarbonPeriod::create(Carbon::parse(request()->start_date)->startOfWeek(Carbon::SUNDAY), Carbon::parse(request()->end_date)->endOfWeek(Carbon::SATURDAY));
        $meetings = [];

        foreach ($dateRange as $date) {
            // Get the day of week as an integer (0 for Sunday, 6 for Saturday)
            $dayOfWeek = $date->dayOfWeek;

            // Check if there is availability for the current day of week
            if (array_key_exists($dayOfWeek, $availabilities)) {
                $dayAvailabilities = $availabilities[$dayOfWeek];

                // Loop through each availability for this day
                foreach ($dayAvailabilities as $availability) {
                    if ($availability->bookingRequest && $availability->bookingRequest->date == $date->format('Y-m-d')) {
                        $status = 'booked';
                    } elseif ($date->format('Y-m-d') < now()->format('Y-m-d')) {
                        $status = 'not-available';
                    } else {
                        $status = 'available';
                    }
                    $meetings[] = [
                        'id' => $availability->id,
                        'start' => $date->format('Y-m-d').'T'.$availability->start_time, // FullCalendar expects ISO format
                        'end' => $date->format('Y-m-d').'T'.$availability->end_time,
                        'status' => $status,
                    ];
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Availability has been fetched successfully.', 'data' => $meetings]);
    }

    public function destroy(Availability $availability)
    {
        $availability->delete();

        return response()->json(['success' => true, 'message' => 'Availability has been deleted successfully.']);
    }

    public function availableSlot(Request $request)
    {
        $counselors = CCJPO::with('user:id,name')->select('id', 'user_id')->latest()->get();

        return view('available-slots', compact('counselors'));
    }
}
