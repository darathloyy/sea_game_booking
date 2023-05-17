<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $booking = Booking::all();
        return response()->json(['message' => 'Successfully', 'data' => $booking], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => "required"
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $event = Event::find(request('event_id'));
        if ($event->number_ticket <= 0) {
            return response()->json(['message' => 'Ticket is sold out'], 200);
        } else {

            $event->update([
                'number_ticket' => $event['number_ticket'] - 1
            ]);
            $booking = Booking::create($validator->validate());
            return response()->json(['message' => 'Booking successfully!', 'data' => $booking], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
