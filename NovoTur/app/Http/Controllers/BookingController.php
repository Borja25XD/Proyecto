<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Mail\BookingsConfirmed;
use Illuminate\Http\Request;
use App\Models\Pitches;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pitches = Pitches::get();
        $bookings = Bookings::get();
        $hours = Bookings::getPossibleStatuses();
        return view("booking")->with(["pitches" => $pitches, "bookings" => $bookings, "hours" => $hours]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Europe/London');
        //return (auth()->user()->email);
        request()->validate([
            "owner_name" => 'required',
            "owner_email" => 'required|email',
        ]);

        $currentDate = date("Y-m-d");
        $failedBookings = [];
        $bookingData = [];
        $currentHour = date("h");

        foreach ($request->pitches as $key => $pitch) {
            $hours = explode(",", $pitch);
            foreach ($hours as $hour) {
                if ($hour != null) {
                    if (DB::table('bookings')->where([
                        ['date', '=', $request->date],
                        ['hour', '=', $hour],
                        ['pitch_id', '=', $key]
                    ])->doesntExist()) {
                        if ($currentDate <= $request->date && $currentHour < $hour) {
                            array_push($bookingData, $request->date);
                            array_push($bookingData, $key);
                            array_push($bookingData, $hour);
                            Bookings::insert(
                                [
                                    'pitch_id' => $key,
                                    'date' => $request->date,
                                    'hour' => $hour,
                                    'owner_name' => $request->owner_name,
                                    'owner_email' => $request->owner_email
                                ]
                            );
                        } else {
                            array_push($failedBookings, $request->date);
                            array_push($failedBookings, $key);
                            array_push($failedBookings, $hour);
                        }
                    }
                }
            }
        };
        Mail::to($request->owner_email)->queue(new BookingsConfirmed($bookingData));

        return (view('booking_confirmed')->with(["failed" => $failedBookings]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //return(auth()->user()->email);
        $query = DB::table('bookings')->where([
            ['owner_email', '=', auth()->user()->email],
            ['date', '=', $request->date],
            ['hour', '=', $request->hour],
            ['pitch_id', '=', $request->pitch]
        ]);
        //return($request);
        if ($query->exists()) {
            $query->delete();
        }
        return (view('account_dashboard')->with(["algo" => 1]));
    }
}
