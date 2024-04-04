<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Flighttype;
use Carbon\Carbon;

class FlightTypeController extends Controller
{
    //flight_type
    public function index()
    {
        $flight_type = Flighttype::all();
        return view('admin.FlightType.index', compact('flight_type'));
    }

    //flight_type
    // public function flight_type_add()
    // {
    //     $flight_type = Flighttype::all();
    //     return view('admin.flight_type.add', compact('flight_type'));
    // }

    //flight_type_edit
    public function edit($id)
    {
        $flight_type = Flighttype::findOrFail($id);
        return view('admin.FlightType.edit', compact('flight_type'));
    }

    //flight_type_delete
    public function destroy($id)
    {
            $flight_type = Flighttype::findOrFail($id);
            $flight_type->delete();
            // Redirect back with a success message
            return back()->with('danger', 'flight_type Deleted Successfully');
    }

    //flight_type add
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
        ]);

        $flight_type = Flighttype::create([
            'name'       => $request->name,
            'created_at'    => Carbon::now(),
        ]);


        return back()->with('success' , 'flight_type Added Successfully');
    }

    //flight_type update
    public function update(Request $request ,$id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
        ]);

        $flight_type = Flighttype::findOrFail($id)->update([
            'name'       => $request->name,
            'updated_at'    => Carbon::now(),
        ]);


        return back()->with('success' , 'flight_type Updated Successfully');
    }
    // Implement additional methods for creating, editing, and deleting flights if necessary
}
