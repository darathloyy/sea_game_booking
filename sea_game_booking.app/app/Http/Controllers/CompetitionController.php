<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $competitions= Competition::all();
        return response()->json(['message' => 'successfully','data' => $competitions],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'match'=>'required|unique:competitions',
            'time' => 'required|date_format:H:i:s',
            'event_id' => 'required',
            'description'=>'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        } else {
            $competition = Competition::create($validator->validated());
            return response()->json(['message' => 'Successfully created', 'data' => $competition], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $competition = Competition::where('event_id', $id)->get();
        return response()->json(['message' => 'success', 'data' => $competition],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $competition=Competition::find($id);
        $validator=Validator::make($request->all(),[
            'match'=>'required|unique:competitions',
            'time'=>'required|unique:competitions',
            'event_id'=>'required',
            'description'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],422);
        }else{
            $competition->update($validator->validated());
            return response()->json(['message'=>'successfully','data'=>$competition],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $competition=Competition::find($id);
        $competition->delete();
        return response()->json(['message'=>'successfully'],200);
    }
    // public function getllCompetitionEvent($id)
    // {
    //     //
    //     $competition=Event::find($id)->competition;
    //     // return Event::find($id)->competition;
    //     return response()->json(['message'=>'request successfully','data'=>$competition],200);
    // }
}
