<?php

namespace App\Http\Controllers\AirlineManager;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Show all flights for the logged-in airline manager
    public function index()
    {
        $flights = Flight::where('airline_manager_id', auth()->id())->get();
        return view('airlinemanager.flights.index', compact('flights'));
    }

    // Show the form for creating a new flight
    public function create()
    {
        return view('airlinemanager.flights.create');
    }

    // Store a newly created flight in storage
    public function store(Request $request)
    {
        $request->validate([
            // Validation rules for flight creation
        ]);

        $flight = new Flight($request->all());
        $flight->airline_manager_id = auth()->id();
        $flight->status = 'pending'; // Assuming a new flight requires admin approval
        $flight->save();

        return redirect()->route('airlinemanager.flights.index')->with('success', 'Flight submitted for approval.');
    }

    // Show the form for editing the specified flight
    public function edit($id)
    {
        $flight = Flight::where('id', $id)->where('airline_manager_id', auth()->id())->firstOrFail();
        return view('airlinemanager.flights.edit', compact('flight'));
    }

    // Update the specified flight in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            // Validation rules for flight update
        ]);

        $flight = Flight::where('id', $id)->where('airline_manager_id', auth()->id())->firstOrFail();
        $flight->fill($request->all());
        $flight->save();

        return redirect()->route('airlinemanager.flights.index')->with('success', 'Flight details updated.');
    }

    // Remove the specified flight from storage
    public function destroy($id)
    {
        $flight = Flight::where('id', $id)->where('airline_manager_id', auth()->id())->firstOrFail();
        $flight->delete();

        return redirect()->route('airlinemanager.flights.index')->with('success', 'Flight deleted.');
    }
    // Additional methods for managing flights can be added as needed...
}