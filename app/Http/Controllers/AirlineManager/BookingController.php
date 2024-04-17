<?php

namespace App\Http\Controllers\AirlineManager;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('airlinemanager.booking.index', compact('bookings'));
    }

}