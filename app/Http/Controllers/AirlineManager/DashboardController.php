<?php

namespace App\Http\Controllers\AirlineManager;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Display the dashboard with relevant statistics.
    public function index()
    {
        $airlineManagerId = Auth::id();

        $flights = Flight::where('airline_manager_id', $airlineManagerId)->get();

        $totalFlights = $flights->count();
        $totalBookings = Booking::whereIn('flight_id', $flights->pluck('id'))->count();
        $pendingFlights = $flights->where('status', 'pending_approval')->count();

        return view('airlinemanager.dashboard.index', [
            'totalFlights' => $totalFlights,
            'totalBookings' => $totalBookings,
            'pendingFlights' => $pendingFlights,
            // Add any additional stats you want to track
        ]);
    }
}
