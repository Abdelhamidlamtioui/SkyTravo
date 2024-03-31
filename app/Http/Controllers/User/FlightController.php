<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Flight;
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
}
