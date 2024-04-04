<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Nationality;
use Carbon\Carbon;

class NationalityController extends Controller
{
    // Index - Display a listing of the resource.
    public function index()
    {
        $nationalities = Nationality::all();
        return view('admin.nationality.index', compact('nationalities'));
    }

    // Edit - Show the form for editing the specified resource.
    public function edit($id)
    {
        $nationality = Nationality::findOrFail($id);
        return view('admin.nationality.edit', compact('nationality'));
    }

    // Destroy - Remove the specified resource from storage.
    public function destroy($id)
    {
        $nationality = Nationality::findOrFail($id);
        $nationality->delete();
        // Redirect back with a success message
        return back()->with('danger', 'Nationality Deleted Successfully');
    }

    // Store - Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $nationality = Nationality::create([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Nationality Added Successfully');
    }

    // Update - Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $nationality = Nationality::findOrFail($id);
        $nationality->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Nationality Updated Successfully');
    }
}