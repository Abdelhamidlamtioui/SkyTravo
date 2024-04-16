<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AirportRequest;
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

    public function store(AirportRequest $request)
    {
        $request->validated();

        $airport = Airport::create([
            'name' => $request->name,
            'best_destination' => $request->best_destination,
            'created_at' => Carbon::now(),
        ]);

        // Handle file upload if necessary
        if ($request->hasFile('image')) {
            $airport->addMediaFromRequest('image')->toMediaCollection('media/AirportImage');
        }

        return redirect()->route('admin.airport.index')->with('success', 'Airport Added Successfully');
    }

    public function edit($id)
    {
        $airport = Airport::findOrFail($id);
        return view('admin.airport.edit', compact('airport'));
    }

    public function update(AirportRequest $request, $id)
    {
        $request->validated();

        $airport = Airport::findOrFail($id);
        $airport->update([
            'name' => $request->name,
            'best_destination' => $request->best_destination,
            'updated_at' => Carbon::now(),
        ]);

        // Handle file upload if necessary
        if ($request->hasFile('image')) {
            if ($airport->hasMedia('media/AirportImage')) {
                $airport->clearMediaCollection('media/AirportImage');
            }
            $airport->addMediaFromRequest('image')->toMediaCollection('media/AirportImage');
        }

        return redirect()->route('admin.airport.index')->with('success', 'Airport Updated Successfully');
    }

    public function destroy($id)
    {
        Airport::findOrFail($id)->delete();
        return redirect()->route('admin.airport.index')->with('danger', 'Airport Deleted Successfully');
    }
}
