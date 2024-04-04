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
            'trip' => 'required|in:option1,option2', // Assuming 'option1' is return, 'option2' is one way
            'origin' => 'required|exists:airports,id', // Use the correct field names
            'destination' => 'required|exists:airports,id',
            'departure_date' => 'required|date',
            'return_date' => 'nullable|date|after:departure_date',
            // Add validation for other fields as necessary
        ]);

        // Initial query builder setup
        $flightsQuery = Flight::where('origin_airport_id', $validated['origin'])
                            ->where('destination_airport_id', $validated['destination'])
                            ->whereDate('departure_at', '>=', Carbon::createFromFormat('Y-m-d', $validated['departure_date']));

        if ($validated['trip'] === 'option1' && isset($validated['return_date'])) { // If return trip
            $flightsQuery = $flightsQuery->whereDate('arrival_at', '<=', Carbon::createFromFormat('Y-m-d', $validated['return_date']));
        }

        // Execute the query
        $flights = $flightsQuery->get();

        // You can pass the results to a view or return them directly
        // For demonstration, let's return the flights collection
        return view('users.flight-list', compact('flights'));
    }
}
