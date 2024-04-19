<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('user.profile.edit');
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name'     => $request->name,
            'location' => $request->location,
            'mobile'   => $request->mobile,
            'date'     => $request->date,
            'gender'   => $request->gender,
            'about'    => $request->about,
        ]);

        if ($request->hasFile('image')) {
            // If an old image exists, remove it
            if ($user->hasMedia('media/Profile')) {
                $user->clearMediaCollection('media/Profile');
            }
            $user->addMediaFromRequest('image')->toMediaCollection('media/Profile');
        }

        return back()->with('success', 'Profile Updated Successfully');
    }
    
    public function email_update(Request $request , $id)
    {
        $user = User::findOrFail($id)->update([
            'email'       => $request->email,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('email' , 'Email Updated Successfully');
    }

    public function index_delete()
    {
        return view('user.profile.delete-account');
    }

    function password_update(Request $request , $id){
 
        if(Hash::check($request->old_password , Auth::user()->password)){
            User::findOrFail($id)->update([
                'password'=>bcrypt($request->password),
                'updated_at'=>Carbon::now(),
            ]);

            return back()->with('password', 'Password Updated Successfully!');
        }
        else{
            return back()->with('error', 'Old password dose not match');
        }
 
      }


    public function destroy(Request $request)
    {

        if (Hash::check($request->password, Auth::user()->password)) {

            Auth::user()->delete();
            
            return redirect()->route('home')->with('status', 'Account deleted successfully.');
        } else {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }
    }
}
