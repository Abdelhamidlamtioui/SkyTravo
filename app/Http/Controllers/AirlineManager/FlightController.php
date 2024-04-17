<?php

namespace App\Http\Controllers\AirlineManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightRequest;
use App\Http\Requests\ManagerFlightRequest;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Flight;
use Carbon\Carbon;

class FlightController extends Controller
{
    // Show all flights for the logged-in airline manager
    public function index()
    {
        $flights = Flight::where('airline_id', auth()->user()->airline_company_id)->get();
        return view('airlinemanager.flights.index', compact('flights'));
    }

    public function create()
    {
        $airlines = Airline::all();
        $airports = Airport::all();
        return view('airlinemanager.flights.create', compact('airlines', 'airports'));
    }

    public function store(ManagerFlightRequest $request)
    {
        $duration = $this->calculateDuration($request->departure_at, $request->arrival_at);
        $flight = new Flight($request->validated() + [
            'flight_duration' => $duration,
            'status' => '0', 
            'airline_id' => auth()->user()->airline_company_id
        ]);
        $flight->save();
        return redirect()->route('airlinemanager.flight.index')->with('success', 'Flight submitted for approval.');
    }

    public function show(Flight $flight)
    {
        return view('airlinemanager.flights.show', compact('flight'));
    }

    public function edit(Flight $flight)
    {
        $airlines = Airline::all();
        $airports = Airport::all();
        return view('airlinemanager.flights.edit', compact('flight', 'airlines', 'airports'));
    }

    public function update(ManagerFlightRequest $request, Flight $flight)
    {
        $duration = $this->calculateDuration($request->departure_at, $request->arrival_at);
        $flight->update($request->validated() + [
            'flight_duration' => $duration,
        ]);
        return redirect()->route('airlinemanager.flight.index')->with('success', 'Flight update submitted for approval.');
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('airlinemanager.flight.index')->with('success', 'Flight deleted successfully.');
    }

    private function calculateDuration($departure, $arrival)
    {
        $departure = Carbon::parse($departure);
        $arrival = Carbon::parse($arrival);
        $durationInMinutes = $departure->diffInMinutes($arrival);
        $hours = intdiv($durationInMinutes, 60);
        $minutes = $durationInMinutes % 60;
        return "{$hours}H {$minutes}M";
    }
}