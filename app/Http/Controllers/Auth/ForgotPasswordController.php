<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = uniqid();

        $user = User::where('email', $request->email)->first();
        $user->remember_token = $token;
        $user->save();
        $resetLink = route('password.reset', ['token' => $token]);
        Mail::to($request->email)->send(new ResetPasswordMail($resetLink));
        return back()->with('message', 'Password reset email sent successfully.');
    }

}
