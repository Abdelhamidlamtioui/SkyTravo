<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class ProfileController extends Controller
{
    public function my_profile()
    {
        return view('my_profile');
    }

    public function wish_list()
    {
        $wishlist = Wishlist::where('user_id' , Auth::user()->id)->get();
        return view('my_wishlists' , compact('wishlist'));
    }

    public function profile_update(Request $request , $id)
    {

        if($request->image == null){
            $user = User::findOrFail($id)->update([
                'name'       => $request->name,
                'location'   => $request->location,
                'mobile'     => $request->mobile,
                'date'       => $request->date,
                'gender'     => $request->gender,
                'about'      => $request->about,
                'updated_at' => Carbon::now(),
            ]);
        }else{

            $user = User::findOrFail($id)->update([
                'name'       => $request->name,
                'location'   => $request->location,
                'mobile'     => $request->mobile,
                'date'       => $request->date,
                'gender'     => $request->gender,
                'about'      => $request->about,
                'updated_at' => Carbon::now(),
            ]);

            $uploaded_file = $request->image;
            $extension = $uploaded_file->getClientOriginalExtension();
            $file_name = substr(md5(time()), 0, 10).'.'.$extension;
            $uploaded_file->move("image/profile", $file_name);

            User::findOrFail($id)->update([
                'image'=>$file_name,
            ]);
    }

        return back()->with('success' , 'Profile Updated Successfully');
    }

    public function email_update(Request $request , $id)
    {
        $user = User::findOrFail($id)->update([
            'email'       => $request->email,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('email' , 'Email Updated Successfully');
    }

    // password update
    function password_update(Request $request , $id){
        // $request->validate([
        //     'old_password'=>'required',
        //     'password'=>'required',
        //     'password'=>Password::min(8)
        //                      ->letters()
        //                      ->mixedCase()
        //                      ->numbers()
        //                      ->symbols(),
        //      'password'=>'confirmed',
        // ]);
 
        if(Hash::check($request->old_password , Auth::user()->password)){
            User::findOrFail($id)->update([
                'password'=>bcrypt($request->password),
                'updated_at'=>carbon::now(),
            ]);

            return back()->with('password', 'Password Updated Successfully!');
        }
        else{
            return back()->with('error', 'Old password dose not match');
        }
 
      }
}
