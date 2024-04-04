<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function destroy($id)
    {
            $reviews = Review::findOrFail($id);
            $reviews->delete();
            // Redirect back with a success message
            return back()->with('danger', 'Review Deleted Successfully');
    }

    public function index(Request $request)
    {
        $reviews = Review::all();
        $flights = Flight::all();
        return view('admin.reviews.index', compact('reviews' , 'flights'));
    }

    //airline_edit
    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        $flights = Flight::all();
        return view('admin.reviews.edit', compact('reviews' , 'flights'));
    }

    public function store(Request $request)
    {
        $reviews = Review::create([
            'flight_id'     => $request->flight_id,
            'name'          => $request->name,
            'location'      => $request->location,
            'review'        => $request->review,
            'star'          => $request->star,
            'best_review'   => $request->best_review,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('success', 'Review Added Successfully');
    }

    public function update(Request $request ,$id)
    {
        $reviews = Review::findOrFail($id)->update([
            'flight_id'     => $request->flight_id,
            'name'          => $request->name,
            'location'      => $request->location,
            'review'        => $request->review,
            'star'          => $request->star,
            'best_review'   => $request->best_review,
            'updated_at'    => Carbon::now(),
        ]);
        return back()->with('success', 'Review Updated Successfully');
    }
}
