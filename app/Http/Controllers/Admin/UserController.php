<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $authenticatedUser = auth()->user();
        $users = User::where('id', '!=', $authenticatedUser->id)
                     ->with('roles')
                     ->get();
        
        $roles = Role::all();
        
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        $user->roles()->attach($request->role); 

        return redirect()->route('admin.user.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|exists:roles,id'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email'));

        $user->roles()->sync($request->role); 

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully!');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }

    // Block or unblock a user
    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->is_blocked = !$user->is_blocked; 
        $user->save();

        $status = $user->is_blocked ? 'blocked' : 'unblocked';
        return redirect()->route('admin.user.index')->with('success', "User has been {$status}.");
    }
}
