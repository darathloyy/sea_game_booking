<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $event = Event::all();
        return response()->json(['message' => 'success', 'data' => $event], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'number_ticket' => 'required',
            'sport_id' => 'required',
            'location_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        } else {
            $event = Event::create($validator->validated());
            return response()->json(['message' => 'Successfully created', 'data' => $event], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $compeition = Event::find($id)->compeitions;
        return response()->json(['message' => 'success', 'data' => $compeition], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $event=Event::find($id);
        $validator = Validator::make($request->all(), [
            'date' => 'required|unique:events',
            'number_ticket' => 'required',
            'sport_id' => 'required',
            'location_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        } else {
            $event->update($validator->validated());
            return response()->json(['message' => 'Successfully created', 'data' => $event], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $event=Event::find($id);
        $event->delete();
        return response()->json(['message' =>'successfully deleted'],200);
    }

    public function getDitail($id)
    {
        //
        // $event = Event::select('date', 'location_id', 'number_ticket', 'sport_id')->where('id', $id)->get();
        // $competition = Competition::select('match', 'time', 'description')->where('event_id', $id)->get();

        $event = Event::leftJoin('competitions', 'events.id', '=', 'competitions.event_id')
            ->leftJoin('sports', 'events.sport_id', '=', 'sports.id')
            ->leftJoin('locations', 'events.location_id', '=', 'locations.id')
            ->select(
                'sports.name',
                'competitions.match',
                'sports.gender',
                'events.date',
                'competitions.time',
                'competitions.description',
                'locations.address'
            )
            ->where('events.id', $id)
            ->get();
        return response()->json(['message' => 'success', 'data' => $event], 200);
    }

    public function search ($sport_name) 
    {
        $event = Event::leftJoin('competitions', 'events.id', '=', 'competitions.event_id')
        ->leftJoin('sports', 'events.sport_id', '=', 'sports.id')
        ->where('sports.name','like','%'.$sport_name.'%')->get();
        return response()->json(['message'=>'successfully','data'=>$event],200);
    }
}
