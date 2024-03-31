<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
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

    public function review_delete($id)
    {
            $reviews = Review::findOrFail($id);
            $reviews->delete();
            // Redirect back with a success message
            return back()->with('danger', 'Review Deleted Successfully');
    }

    public function reviews(Request $request)
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function review_insert(Request $request)
    {
        $reviews = Review::create([
            'name'          => $request->name,
            'location'      => $request->email,
            'review'        => $request->review,
            'star'          => $request->star,
            'created_at'    => Carbon::now(),
        ]);
    }
}
