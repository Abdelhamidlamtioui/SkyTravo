<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Nationality;
use App\Models\Passenger;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    public function wish_list()
    {
        $wishlist = Wishlist::where('user_id' , Auth::user()->id)->get();
        return view('user.profile.my_wishlists' , compact('wishlist'));
    }




    public function passengers()
    {
        $passengers = Passenger::where('user_id' , Auth::user()->id)->get();
        $nationalities = Nationality::all();
        return view('user.profile.passenger' , compact('passengers','nationalities'));
    }

    public function passenger_store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'passport_expire' => 'required|date',
            'date_of_birth' => 'required|date',
            'nationality_id' => 'required|integer|exists:nationalities,id',
        ]);
        
        $fullName = $validated['first_name'] . " " . $validated['last_name'];
        $passenger = new Passenger([
            'user_id' => Auth::user()->id,
            'name' => $fullName,
            'passport_number' => $validated['passport_number'],
            'passport_expire' => $validated['passport_expire'],
            'date_of_birth' => $validated['date_of_birth'],
            'nationality_id' => $validated['nationality_id']
        ]);
        $passenger->save();

        return redirect()->route('user.profile.passenger')->with('success', 'Passanger Added Successfully');
    }

    public function passenger_update(Request $request, Passenger $passenger)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'passport_expire' => 'required|date',
            'date_of_birth' => 'required|date',
            'nationality_id' => 'required|integer|exists:nationalities,id',
        ]);

        $fullName = $validated['first_name'] . " " . $validated['last_name'];
        $passenger->update([
            'name' => $fullName,
            'passport_number' => $validated['passport_number'],
            'passport_expire' => $validated['passport_expire'],
            'date_of_birth' => $validated['date_of_birth'],
            'nationality_id' => $validated['nationality_id']
        ]);

        return redirect()->route('user.profile.passenger')->with('success', 'Passanger Added Successfully');
    }

    public function passenger_destroy(Passenger $passenger)
    {
        $passenger->delete();
        return redirect()->route('user.profile.passenger')->with('success', 'Passanger Added Successfully');
    }

    public function myBookings()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->where('status', 'paid')->get();
        return view('/user/profile/my-booking', compact('bookings', 'user'));
    }

    public function payment_details(Request $request)
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->get();
        return view('/user/profile/payment-detail', compact('bookings'));
    }

}
