<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Flight;
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
    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('user.flights.show', compact('flight'));
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
                            ->whereDate('departure_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['departure_date']))->get();

        if ($validated['trip'] === 'option1' && isset($validated['return_date'])) { // If return trip
            $flights[] = Flight::where('origin_airport_id', $validated['destination'])
                            ->where('destination_airport_id', $validated['origin'])
                            ->whereDate('arrival_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['return_date']))->get();

            for ($i = 0; $i < count($flights[0]); $i++) {
                $arr[] = [$flights[0][$i], $flights[1][$i]];
            }
        }
        $flightPrice=
        $flights = $validated['trip'] === 'option1' ? $arr : $flights;
        return view('user.flight-list', compact('flights','flightType'));
    }
}
