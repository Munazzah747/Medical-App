<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class AdminUserController extends Controller
{
   

 public function activate(User $user)
    {
        $user->update(['is_active' => true]);

        return back()->with('success', 'User account activated successfully.');
    }

    public function deactivate(User $user)
    {
        $user->update(['is_active' => false]);

        return back()->with('success', 'User account deactivated successfully.');
    }


    // public function edit(User $user)
    // {
    //     return view('Admin_Dashboard.Doctor.index', compact('user'));
    // }
    public function edit(User $user)
{
    $users = User::with('roles')->get(); // Table still needs all users
    $editUser = $user; // Pass the user to edit
    $roles = Role::all(); // Pass roles for the select dropdown
    return view('Admin_Dashboard.Doctor.create', compact('users', 'editUser','roles'));
}

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}
