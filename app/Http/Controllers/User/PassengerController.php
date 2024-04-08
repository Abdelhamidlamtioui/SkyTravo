<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id'=>'required|integer|exists:bookings,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'passport_expire' => 'required|date',
            'date_of_birth' => 'required|date',
            'nationality_id' => 'required|integer|exists:nationalities,id',
        ]);
        $fullName= $validated['first_name']." ". $validated['last_name'];
        $passenger = new Passenger();
        $passenger->booking_id = $validated['booking_id'];
        $passenger->name = $fullName;
        $passenger->passport_number = $validated['passport_number'];
        $passenger->passport_expire = $validated['passport_expire'];
        $passenger->date_of_birth = $validated['date_of_birth'];
        $passenger->nationality_id = $validated['nationality_id'];
        $passenger->save();

        // Return a JSON response
        return response()->json([
            'first_name' => $passenger->name,
            'passport_number' => $passenger->passport_number,
            'gender' => $passenger->gender,
            'nationality' => $passenger->nationality->name,
            'date_of_birth' => $passenger->date_of_birth,
            'success' => true,
            'message' => 'Passenger added successfully.',
        ]);
    }
}
