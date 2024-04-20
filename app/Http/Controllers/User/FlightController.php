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
use Monolog\Handler\IFTTTHandler;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $flights = Flight::where('departure_at', '>', now())->get();

        return view('user.flights.index', compact('flights'));
    }

    // Display the specified flight's details
    public function show(Request $request)
    {
        $userId = auth()->user()->id; 
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

            $booking = Booking::create([
                'user_id' => $userId,
                'depart_flight_id' => $id1,
                'return_flight_id' => $id2,
                'total_price' => $totalPrice,
                'flight_type_id' => $flightType->id,
            ]);
        } else {
            $totalPrice = match($flightTypeName) {
                "Economy" => $departFlight->economy_price,
                "Premium Economy" => $departFlight->premium_economy_price,
                "Business Class" => $departFlight->business_class_price,
                "First Class" => $departFlight->first_class_price,
            };

            $booking = Booking::create([
                'user_id' => $userId,
                'depart_flight_id' => $id1,
                'total_price' => $totalPrice,
                'flight_type_id' => $flightType->id,
            ]);
        }

        Passenger::where('user_id', $userId)->update(['booking_id' => $booking->id]);

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
            'trip' => 'required|in:option1,option2',
            'origin' => 'required|exists:airports,id',
            'destination' => 'required|exists:airports,id',
            'departure_date' => 'required|date',
            'return_date' => 'nullable|date|after:departure_date',
            'flightType'  => 'required|exists:flight_types,name',
        ]);

        $flightType=$validated['flightType'];
        $flights = [];
        $arr = [];
        $flights[] = Flight::where('origin_airport_id', $validated['origin'])
                            ->where('destination_airport_id', $validated['destination'])
                            ->whereDate('departure_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['departure_date']))
                            ->get();

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
        $flights = $validated['trip'] === 'option1' ? $arr : $flights;
        return view('user.flight.flight-list', compact('flights','flightType'));
    }
}
