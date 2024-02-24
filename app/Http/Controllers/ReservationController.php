<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        //

        $reservations = Reservation::all();

        return response()->json([
            "message" => "reservation display it successfully",
            "reservation" => $reservations
        ]);
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Reservation $reservation)
    {
        //

        $reservations = $reservation->create($request->all());
        return response()->json([
            "message" => "reservation deleted successfully",
            "reservation" => $reservation
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        return response()->json([
            "message" => "reservation display it successfully",
            "reservations" => $reservation
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation, $id)
    {
        //

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return response()->json([
            "message" => "reservation deleted successfully",
            "reservation" => $reservation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $reservation = Reservation::findOrFail($id);
        $reservation->delete($id);
        return response()->json([
            "message" => "reservation deleted successfully",
        ]);
    }
}
