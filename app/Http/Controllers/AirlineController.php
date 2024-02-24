<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function index()
    {
        //

        $airline = Airline::all();

        return response()->json([
            "message" => "comments display it successfully",
            "airline" => $airline
        ]);
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Airline $airline)
    {
        //

        $airlines = $airline->create($request->all());
        return response()->json([
            "message" => "comments deleted successfully",
            "airline" => $airlines
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $airline = Airline::findOrFail($id);

        return response()->json([
            "message" => "comments display it successfully",
            "airline" => $airline
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airline $airline, $id)
    {
        //

        $airline = Airline::findOrFail($id);
        $airline->update($request->all());
        return response()->json([
            "message" => "comments deleted successfully",
            "airline" => $airline
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $airline = Airline::findOrFail($id);
        $airline->delete($id);
        return response()->json([
            "message" => "comments deleted successfully",
        ]);
    }
}
