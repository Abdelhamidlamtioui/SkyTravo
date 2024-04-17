<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FlightRequest; // Ensure this exists with proper validation

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('admin.flights.index', compact('flights'));
    }

    public function create()
    {
        $airlines = Airline::all();
        $airports = Airport::all();
        return view('admin.flights.create', compact('airlines', 'airports'));
    }

    public function store(FlightRequest $request)
    {

        $duration = $this->calculateDuration($request->departure_at, $request->arrival_at);
        $flight = Flight::create($request->validated() + ['flight_duration' => $duration]);
        return redirect()->route('admin.flight.index')->with('success', 'Flight added successfully.');
    }

    public function show(Flight $flight)
    {
        return view('admin.flights.show', compact('flight'));
    }

    public function edit(Flight $flight)
    {
        $airlines = Airline::all();
        $airports = Airport::all();
        return view('admin.flights.edit', compact('flight', 'airlines', 'airports'));
    }

    public function update(FlightRequest $request, Flight $flight)
    {
        $duration = $this->calculateDuration($request->departure_at, $request->arrival_at);
        $flight->update($request->validated() + ['flight_duration' => $duration]);
        return redirect()->route('admin.flight.index')->with('success', 'Flight updated successfully.');
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('admin.flight.index')->with('success', 'Flight deleted successfully.');
    }

    public function approve($id)
    {
        $userRole = Auth::user()->roles->first()->name;

        if ($userRole == 'admin') {
            $flight = Flight::findOrFail($id);
            $flight->status = '2';
            $flight->save();
            return back()->with('success', 'Flight approved successfully!');
        }

        return back()->with('danger', 'You do not have permission!');
    }

    public function reject($id)
    {
        $userRole = Auth::user()->roles->first()->name;

        if ($userRole == 'admin') {
            $flight = Flight::findOrFail($id);
            $flight->status = '1';
            $flight->save();
            return back()->with('success', 'Flight rejected successfully!');
        }

        return back()->with('danger', 'You do not have permission!');
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