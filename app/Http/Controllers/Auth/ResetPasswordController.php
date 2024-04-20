<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return redirect()->route('password.request')->with('error', 'Invalid or expired reset token.');
        }

        return view('auth.reset-password')->with(['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('remember_token', $request->token)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $user->password = bcrypt($request->password);
        $user->remember_token = null; 
        $user->save();

        //Mail::to($user->email)->send(new ResetPasswordMail());

        return redirect()->route('login')->with('success', 'Password reset successfully. Please login with your new password.');
    }
}