<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AirlineRequest;
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

    public function store(AirlineRequest $request)
    {
        $request->validated();

        $airline = Airline::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $airline->addMediaFromRequest('image')->toMediaCollection('media/AirlinesLogos');
        }

        return redirect()->route('admin.airline.index')->with('success', 'Airline Added Successfully');
    }

    public function edit($id)
    {
        $airline = Airline::findOrFail($id);
        return view('admin.airline.edit', compact('airline'));
    }

    public function update(AirlineRequest $request, $id)
    {
        $request->validated();

        $airline = Airline::findOrFail($id);

        $airline->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image from the media library
            if ($airline->hasMedia('media/AirlinesLogos')) {
                $airline->clearMediaCollection('media/AirlinesLogos');
            }
            $airline->addMediaFromRequest('image')->toMediaCollection('media/AirlinesLogos');
        }

        return redirect()->route('admin.airline.index')->with('success', 'Airline Updated Successfully');
    }

    public function destroy($id)
    {
        Airline::findOrFail($id)->delete();
        return redirect()->route('admin.airline.index')->with('danger', 'Airline Deleted Successfully');
    }
}