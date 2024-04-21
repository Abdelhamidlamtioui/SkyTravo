<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Flighttype;
use App\Models\Nationality;
use App\Models\Passenger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $flights = Flight::where('departure_at', '>', now())->get();

        return view('user.flights.index', compact('flights'));
    }

    public function show(Request $request)
    {
        if(auth()->check()){
            $userId = auth()->user()->id; 
        }
        $id1 = $request->input('id1');
        $id2 = $request->input('id2');
        $flightTypeName = $request->input('flightType');
        $flightType = FlightType::where('name', $flightTypeName)->first();
        $nationalities = Nationality::all();
        $departFlight = Flight::findOrFail($id1);

        if (!empty($id2)) {
            $returnFlight = Flight::findOrFail($id2);
            $totalPrice = match($flightTypeName) {
                "Economy" => $departFlight->economy_price + $returnFlight->economy_price,
                "Premium Economy" => $departFlight->premium_economy_price + $returnFlight->premium_economy_price,
                "Business Class" => $departFlight->business_class_price + $returnFlight->business_class_price,
                "First Class" => $departFlight->first_class_price + $returnFlight->first_class_price,
            };
            
            if(auth()->check()){
            $booking = Booking::create([
                'user_id' => $userId,
                'depart_flight_id' => $id1,
                'return_flight_id' => $id2,
                'total_price' => $totalPrice,
                'flight_type_id' => $flightType->id,
            ]);
            }else{
                $booking = Booking::create([
                    'depart_flight_id' => $id1,
                    'return_flight_id' => $id2,
                    'total_price' => $totalPrice,
                    'flight_type_id' => $flightType->id,
                ]);
            }
        } else {
            $totalPrice = match($flightTypeName) {
                "Economy" => $departFlight->economy_price,
                "Premium Economy" => $departFlight->premium_economy_price,
                "Business Class" => $departFlight->business_class_price,
                "First Class" => $departFlight->first_class_price,
            };
            if(auth()->check()){
                $booking = Booking::create([
                    'user_id' => $userId,
                    'depart_flight_id' => $id1,
                    'total_price' => $totalPrice,
                    'flight_type_id' => $flightType->id,
                ]);
            }else{
                $booking = Booking::create([
                    'depart_flight_id' => $id1,
                    'total_price' => $totalPrice,
                    'flight_type_id' => $flightType->id,
                ]);
            }

        }
        if(auth()->check()){
            Passenger::where('user_id', $userId)->update(['booking_id' => $booking->id]);
        }
        $viewData = [
            'departFlight' => $departFlight,
            'returnFlight' => $returnFlight ?? null,
            'flightTypeName' => $flightTypeName,
            'booking' => $booking,
            'nationalities' => $nationalities,
        ];

        return view('user.flight.show', $viewData);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'trip' => 'nullable|in:option1,option2',
            'origin' => 'nullable|exists:airports,id',
            'destination' => 'nullable|exists:airports,id',
            'departure_date' => 'nullable|date',
            'return_date' => 'nullable|date|after:departure_date',
            'flightType'  => 'nullable|exists:flight_types,name',
        ]);

        if(isset($validated['flightType']))
        {
            $flightType = $validated['flightType'];
        }
        $flights = [];
        $arr = [];
        if(isset($validated['origin']) && isset($validated['destination']) && isset($validated['departure_date']))
        {
            $flights[] = Flight::where('origin_airport_id', $validated['origin'])
                                ->where('destination_airport_id', $validated['destination'])
                                ->whereDate('departure_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['departure_date']))
                                ->get();
        }
        if(isset($validated['trip']))
        {
            if ($validated['trip'] === 'option1' && isset($validated['return_date'])) { 
                $flights[] = Flight::where('origin_airport_id', $validated['destination'])
                                ->where('destination_airport_id', $validated['origin'])
                                ->whereDate('arrival_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['return_date']))->get();
                if(count($flights[0])>count($flights[1]))
                {
                    for ($i = 0; $i < count($flights[1]); $i++) {
                        $arr[] = [$flights[0][$i], $flights[1][$i]];
                    }
                }else{
                    for ($i = 0; $i < count($flights[0]); $i++) {
                        $arr[] = [$flights[0][$i], $flights[1][$i]];
                    }
                }
            }
        }
        if(isset($validated['trip']))
        {
            $flights = $validated['trip'] === 'option1' ? $arr : $flights;
        }
        $flightsTypes=Flighttype::all();
        $airlines = Airline::all();
        $airports = Airport::all();
        if(isset($validated['flightType']))
        {
            return view('user.flight.flight-list', compact('flights', 'flightType', 'airlines', 'airports','flightsTypes'));
        }else{
            return view('user.flight.flight-list', compact('flights', 'airlines', 'airports','flightsTypes'));
        }
    }

}
