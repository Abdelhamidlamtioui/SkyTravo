<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Airline;
use Carbon\Carbon;

class AirlineController extends Controller
{
    public function index()
    {
        $airline = Airline::all();
        return view('admin.airline.index', compact('airline'));
    }

    // public function create()
    // {
    //     return view('admin.airline.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048', 
        ]);

        $airline = Airline::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $airline->addMediaFromRequest('image')->toMediaCollection('AirlinesLogos');
        }

        return redirect()->route('admin.airline.index')->with('success', 'Airline Added Successfully');
    }

    public function edit($id)
    {
        $airline = Airline::findOrFail($id);
        return view('admin.airline.edit', compact('airline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Airline::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.airline.index')->with('success', 'Airline Updated Successfully');
    }

    public function destroy($id)
    {
        Airline::findOrFail($id)->delete();
        return redirect()->route('admin.airline.index')->with('danger', 'Airline Deleted Successfully');
    }
}