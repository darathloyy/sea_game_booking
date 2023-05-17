<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sports= Sport::all();
        return response()->json(['message' => 'successfully','data' => $sports],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        } else {
            $sport = Sport::create($validator->validated());
            return response()->json(['message' => 'Successfully created', 'data' => $sport], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $sport=Sport::find($id);
        return response()->json(['message'=>'successfully','data'=>$sport],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $sport=Sport::find($id);
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'gender'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],422);
        }else{
            $sport->update($validator->validated());
            return response()->json(['message'=>'successfully','data'=>$sport],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id)
    {
        //
        $sport=Sport::find($id);
        $sport->delete($id);
        return response()->json(['message'=>'successfully'],200);
    }
}
