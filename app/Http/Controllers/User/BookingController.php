<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request, $flightId)
    {
        // Validate the request parameters like amount, etc.
        
        $flight = Flight::findOrFail($flightId);
        
        // Process the payment
        $paymentSuccess = $this->processPayment($request, $flight->price);
        
        if ($paymentSuccess) {
            $booking = new Booking();
            $booking->user_id = Auth::id();
            $booking->flight_id = $flight->id;
            // Additional details like number of passengers, class etc.
            $booking->status = 'confirmed';
            $booking->save();

            // Redirect with success message
            return redirect()->route('user.bookings.index')->with('success', 'Flight booked successfully!');
        } else {
            // Redirect with error message
            return back()->withErrors('Payment failed. Please try again.');
        }
    }

    private function processPayment(Request $request, $amount)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => $amount * 100, // Stripe expects the amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Flight booking charge',
            ]);

            // Here you could store charge details like $charge->id to your database

            return $charge->status === 'succeeded';
        } catch (\Exception $e) {
            // You could log the error details ($e->getMessage())
            return false;
        }
    }
}
