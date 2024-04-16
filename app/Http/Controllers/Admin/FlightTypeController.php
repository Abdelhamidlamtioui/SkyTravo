<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightTypeRequest;
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
            return back()->with('danger', 'Flight Type Deleted Successfully');
    }

    //flight_type add
    public function store(FlightTypeRequest $request)
    {
        $request->validated();

        $flight_type = Flighttype::create([
            'name'       => $request->name,
            'created_at'    => Carbon::now(),
        ]);


        return back()->with('success' , 'Flight Type Added Successfully');
    }

    //flight_type update
    public function update(FlighttypeRequest $request ,$id)
    {
        $request->validated();

        $flight_type = Flighttype::findOrFail($id)->update([
            'name'       => $request->name,
            'updated_at'    => Carbon::now(),
        ]);


        return redirect()->route('admin.flighttype.index')->with('success' , 'flight type Updated Successfully');
    }
}
