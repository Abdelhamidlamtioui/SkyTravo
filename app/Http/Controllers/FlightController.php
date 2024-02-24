<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights=Flight::all();
        return response()->json([
            'message'=>'flights Are recived',
            "flights"=>$flights
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {
        $flight=new Flight();
        $flight->create($request->all());
        return response()->json([
            "message"=>'Flight is created',
            "flight"=>$flight
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

      try{
       
        $flight=Flight::findOrFaild($id);
        return response()->json([
            "message"=>"Flight is found",
            "flight"=>$flight
        ]);

      }catch(Exception $e){
        return response()->json(["message" => "something went wrong", $e->getMessage()]);
      }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $flight=Flight::findOrFail($id);
        $flight->Update($request->all());
        return response()->json([
            "message"=>"Flight is succesfully updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $flight=Flight::FindOrFail($id);
        $flight->delete();
        return response()->json([
            "message"=>"Flight is succesfully Deleted"
        ]);
    }
}
