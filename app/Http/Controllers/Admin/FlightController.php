<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Flight;
use Carbon\Carbon;

class FlightController extends Controller
{
    public function flights()
    {
        $flights = Flight::all();
        return view('admin.flights.index', compact('flights'));
    }

    public function flights_insert(Request $request)
    {
        $request->validate([
            'airline'       => 'required|string|max:255',
            'origin'        => 'required|string|max:255',
            'destination'   => 'required|string|max:255',
            'departure_at'  => 'required',
            'arrival_at'    => 'required',
            'price'         => 'required',
        ]);

        $flights = Flight::create([
            'airline'       => $request->airline,
            'origin'        => $request->origin,
            'destination'   => $request->destination,
            'departure_at'  => $request->departure_at,
            'arrival_at'    => $request->arrival_at,
            'price'         => $request->price,
            'created_at'    => Carbon::now(),
        ]);


        return back()->with('success' , 'Flight Added Successfully');
    }

    public function list()
    {
        $userRole = Auth::user()->roles->first()->name;
        $flights = Flight::all();
        return view('admin.flights.list', compact('flights' , 'userRole'));
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('admin.flights.show', compact('flight'));
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        return view('admin.flights.edit', compact('flight'));
    }

    public function edit_update(Request $request , $id)
    {
        $userRole = Auth::user()->roles->first()->name; 

        $request->validate([
            'airline'       => 'required|string|max:255',
            'origin'        => 'required|string|max:255',
            'destination'   => 'required|string|max:255',
            'departure_at'  => 'required',
            'arrival_at'    => 'required',
            'price'         => 'required',
        ]);

            $flight = Flight::findOrFail($id);
            $flight->airline = $request->input('airline', $flight->airline);
            $flight->origin = $request->input('origin', $flight->origin);
            $flight->destination = $request->input('destination', $flight->destination);
            $flight->departure_at = $request->input('departure_at', $flight->departure_at);
            $flight->arrival_at = $request->input('arrival_at', $flight->arrival_at);
            $flight->price = $request->input('price', $flight->price);
            if($userRole == 'admin'){
                $flight->status = 'approved';
            }else{
                $flight->status = 'rejected';
            }
            $flight->save();



            if ($userRole == 'admin'){
                return back()->with('success' , 'Flight Edited Successfully');
            }else{
                return back()->with('warning' , 'Flight Request Submitted! , Wait for Admin Approval');
            }
    }

    public function approve(Request $request, $id)
    {
        $userRole = Auth::user()->roles->first()->name; 

        if ($userRole == 'admin'){
            $flight = Flight::findOrFail($id);
            $flight->status = 'approved';
            $flight->save();
            // Redirect back with a success message
            return back()->with('success', 'Flight approved successfully!');
        }

        return back()->with('danger', 'You Dont have Permission!');
    }

    public function reject(Request $request, $id)
    {
        $userRole = Auth::user()->roles->first()->name; 

        if ($userRole == 'admin'){
            $flight = Flight::findOrFail($id);
            $flight->status = 'rejected';
            $flight->save();
            // Redirect back with a success message
            return back()->with('success', 'Flight rejected Successfully!');
        }

        return back()->with('danger', 'You Dont have Permission!');

    }

    public function delete($id)
    {
            $flight = Flight::findOrFail($id);
            $flight->delete();
            // Redirect back with a success message
            return back()->with('danger', 'Flight Deleted Successfully');

    }

    // Implement additional methods for creating, editing, and deleting flights if necessary
}
