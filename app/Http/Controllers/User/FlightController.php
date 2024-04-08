<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Flighttype;
use App\Models\Nationality;
use App\Models\Passenger;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Show a list of flights based on the user's search criteria
    public function index(Request $request)
    {
        // Add search criteria logic here...
        // For simplicity, we're just going to show all future flights
        $flights = Flight::where('departure_at', '>', now())->get();

        return view('user.flights.index', compact('flights'));
    }

    // Display the specified flight's details
    public function show(Request $request)
    {
        $id1 = $request->input('id1');
        $id2 = $request->input('id2');
        $flightTypeName = $request->input('flightType'); 
        $flightType = Flighttype::where('name', $flightTypeName)->first();
        $nationalities= Nationality::all();
        $departFlight = Flight::findOrFail($id1);
        if(!empty($id2)){
            
            $returnFlight = Flight::findOrFail($id2);
            if($flightTypeName=="Economy"){
                $totalPrice=$departFlight->economy_price+$returnFlight->economy_price;
            }elseif($flightTypeName=="Premium Economy"){
                $totalPrice=$departFlight->premium_economy_price+$returnFlight->premium_economy_price;
            }elseif($flightTypeName=="Business Class"){
                $totalPrice=$departFlight->business_class_price+$returnFlight->business_class_price;
            }elseif($flightTypeName=="First Class"){
                $totalPrice=$departFlight->first_class_price+$returnFlight->first_class_price;
            }
            $booking = Booking::create([
                'depart_flight_id'=>$id1,
                'return_flight_id'=>$id2,
                'total_price'=>$totalPrice,
                'flight_type_id'=>$flightType->id,
            ]);
            
            
            return view('user.flight.show', compact('departFlight', 'returnFlight', 'flightTypeName','booking','nationalities'));
        }else{
            if($flightTypeName=="Economy"){
                $totalPrice=$departFlight->economy_price;
            }elseif($flightTypeName=="Premium Economy"){
                $totalPrice=$departFlight->premium_economy_price;
            }elseif($flightTypeName=="Business Class"){
                $totalPrice=$departFlight->business_class_price;
            }elseif($flightTypeName=="First Class"){
                $totalPrice=$departFlight->first_class_price;
            }
            $booking = Booking::create([
                'depart_flight_id'=>$id1,
                'total_price'=>$totalPrice,
                'flight_type_id'=>$flightType->id,
            ]);
            $departFlight = Flight::findOrFail($id1);
            return view('user.flight.show', compact('departFlight', 'flightTypeName','booking','nationalities'));
        }
        
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'trip' => 'required|in:option1,option2', 
            'origin' => 'required|exists:airports,id', 
            'destination' => 'required|exists:airports,id',
            'departure_date' => 'required|date',
            'return_date' => 'nullable|date|after:departure_date',
            'flightType'  => 'required|exists:flight_types,name',
        ]);

        // Initial query builder setup
        $flightType=$validated['flightType'];
        $flights = [];
        $arr = [];
        $flights[] = Flight::where('origin_airport_id', $validated['origin'])
                            ->where('destination_airport_id', $validated['destination'])
                            ->whereDate('departure_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['departure_date']))
                            ->get();

        if ($validated['trip'] === 'option1' && isset($validated['return_date'])) { // If return trip
            $flights[] = Flight::where('origin_airport_id', $validated['destination'])
                            ->where('destination_airport_id', $validated['origin'])
                            ->whereDate('arrival_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['return_date']))->get();

            for ($i = 0; $i < count($flights[0]); $i++) {
                $arr[] = [$flights[0][$i], $flights[1][$i]];
            }
        }
        $flights = $validated['trip'] === 'option1' ? $arr : $flights;
        return view('user.flight.flight-list', compact('flights','flightType'));
    }
}
