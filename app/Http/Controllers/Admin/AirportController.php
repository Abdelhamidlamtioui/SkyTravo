<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Airport;
use Carbon\Carbon;

class AirportController extends Controller
{
    public function index()
    {
        $airport = Airport::all();
        return view('admin.airport.index', compact('airport'));
    }

    // public function create()
    // {
    //     return view('admin.airport.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $airport = Airport::create([
            'name' => $request->name,
            'best_destination' => $request->best_destination,
            'created_at' => Carbon::now(),
        ]);

        // Handle file upload if necessary
        if ($request->hasFile('image')) {
            $airport->addMediaFromRequest('image')->toMediaCollection('AirportImage');
        }

        return redirect()->route('admin.airport.index')->with('success', 'Airport Added Successfully');
    }

    public function edit($id)
    {
        $airport = Airport::findOrFail($id);
        return view('admin.airport.edit', compact('airport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Include other fields as necessary
        ]);

        $airport = Airport::findOrFail($id);
        $airport->update([
            'name' => $request->name,
            'best_destination' => $request->best_destination,
            'updated_at' => Carbon::now(),
        ]);

        // Handle file upload if necessary
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            $airport->update(['image' => $filename]);
        }

        return redirect()->route('admin.airport.index')->with('success', 'Airport Updated Successfully');
    }

    public function destroy($id)
    {
        Airport::findOrFail($id)->delete();
        return redirect()->route('admin.airport.index')->with('danger', 'Airport Deleted Successfully');
    }
}
