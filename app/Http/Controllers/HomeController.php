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
        $airports = Airport::all();
        $flights = Flight::latest()->take(4)->get();
        $flightsTypes= Flighttype::all();
        return view('welcome', compact('airports' , 'flights','flightsTypes'));
    }

    public function users(Request $request)
    {
        $users = User::where('id','!=',auth::id())->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function manager_insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach(2); 

        return back()->with('success_manager' , 'Air Line Manager Added Successfully');
    }

    public function users_insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach(3); 

        return back()->with('success_user' , 'User Added Successfully');
    }

    public function delete($id)
    {
            $user = User::findOrFail($id);
            $user->delete();
            // Redirect back with a success message
            return back()->with('danger', 'User Deleted Successfully');
    }

}
