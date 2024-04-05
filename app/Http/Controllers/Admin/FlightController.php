<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Flighttype;
use Carbon\Carbon;

class FlightController extends Controller
{
    public function flights()
    {
        $airlines = Airline::all();
        $airports = Airport::all();
        return view('admin.flights.index', compact('airlines' , 'airports'));
    }

    public function flights_insert(Request $request)
    {

        $request->validate([
            'airline_id'                => 'required',
            'origin_airport_id'         => 'required',
            'destination_airport_id'    => 'required',
            'departure_at'              => 'required',
            'arrival_at'                => 'required',
            'economy_price'             => 'required',
            'premium_economy_price'     => 'required',
            'business_class_price'      => 'required',
            'first_class_price'         => 'required',
            'economy_seats'             => 'required',
            'premium_economy_seats'     => 'required',
            'business_class_seats'      => 'required',
            'first_class_seats'         => 'required',
        ]);

        $flights = Flight::create([
            'airline_id'                => $request->airline_id,
            'origin_airport_id'         => $request->origin_airport_id,
            'destination_airport_id'    => $request->destination_airport_id,
            'departure_at'              => $request->departure_at,
            'arrival_at'                => $request->arrival_at,
            'economy_price'             => $request->economy_price,
            'premium_economy_price'     => $request->premium_economy_price,
            'business_class_price'      => $request->business_class_price,
            'first_class_price'         => $request->first_class_price,
            'economy_seats'             => $request->economy_seats,
            'premium_economy_seats'     => $request->premium_economy_seats,
            'business_class_seats'      => $request->business_class_seats,
            'first_class_seats'         => $request->first_class_seats,
            'status'                    => $request->status,
            'created_at'                => Carbon::now(),
        ]);


        return back()->with('success' , 'Flight Added Successfully');
    }

    public function list()
    {
        $flights = Flight::all();
        return view('admin.flights.list', compact('flights'));
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('admin.flights.show', compact('flight'));
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $airlines = Airline::all();
        $airports = Airport::all();
        return view('admin.flights.edit', compact('flight' ,'airlines' , 'airports'));
    }

    public function edit_update(Request $request , $id)
    {

        $request->validate([
            'airline_id'                => 'required',
            'origin_airport_id'         => 'required',
            'destination_airport_id'    => 'required',
            'departure_at'              => 'required',
            'arrival_at'                => 'required',
            'economy_price'             => 'required',
            'premium_economy_price'     => 'required',
            'business_class_price'      => 'required',
            'first_class_price'         => 'required',
            'economy_seats'             => 'required',
            'premium_economy_seats'     => 'required',
            'business_class_seats'      => 'required',
            'first_class_seats'         => 'required',
        ]);

        $flights = Flight::findOrFail($id)->update([
            'airline_id'                => $request->airline_id,
            'origin_airport_id'         => $request->origin_airport_id,
            'destination_airport_id'    => $request->destination_airport_id,
            'departure_at'              => $request->departure_at,
            'arrival_at'                => $request->arrival_at,
            'economy_price'             => $request->economy_price,
            'premium_economy_price'     => $request->premium_economy_price,
            'business_class_price'      => $request->business_class_price,
            'first_class_price'         => $request->first_class_price,
            'economy_seats'             => $request->economy_seats,
            'premium_economy_seats'     => $request->premium_economy_seats,
            'business_class_seats'      => $request->business_class_seats,
            'first_class_seats'         => $request->first_class_seats,
            'status'                    => $request->status,
            'created_at'                => Carbon::now(),
        ]);



                return back()->with('success' , 'Flight Edited Successfully');
    }

    public function approve(Request $request, $id)
    {
        $userRole = Auth::user()->roles->first()->name; 

        if ($userRole == 'admin'){
            $flight = Flight::findOrFail($id);
            $flight->status = 'approved';
            $flight->save();
            // Redirect back with a success message
            return back()->with('success', 'Flight approved successfully!');
        }

        return back()->with('danger', 'You Dont have Permission!');
    }

    public function reject(Request $request, $id)
    {
        $userRole = Auth::user()->roles->first()->name; 

        if ($userRole == 'admin'){
            $flight = Flight::findOrFail($id);
            $flight->status = 'rejected';
            $flight->save();
            // Redirect back with a success message
            return back()->with('success', 'Flight rejected Successfully!');
        }

        return back()->with('danger', 'You Dont have Permission!');

    }

    public function delete($id)
    {
            $flight = Flight::findOrFail($id);
            $flight->delete();
            // Redirect back with a success message
            return back()->with('danger', 'Flight Deleted Successfully');

    }


    // Implement additional methods for creating, editing, and deleting flights if necessary
}
