<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Review;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Flighttype;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{

    public function home(Request $request)
    {
        $bestReviews = Review::where('best_review', true)->orderBy('created_at', 'desc')->take(5)->get();
        $airports = Airport::all();
        $bestAirports = Airport::where('best_destination', true)->orderBy('name', 'asc')->take(8)->get();
        $flights = Flight::latest()->take(4)->get();
        $flightsTypes= Flighttype::all();
        return view('welcome', compact('airports' , 'flights','flightsTypes','bestAirports','bestReviews'));
    }

    public function users(Request $request)
    {
        $users = User::where('id','!=',auth::id())->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function delete($id)
    {
            $user = User::findOrFail($id);
            $user->delete();
            return back()->with('danger', 'User Deleted Successfully');
    }

}
