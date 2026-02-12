<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('Admin_Dashboard.Doctor.index', compact('users'));
    }
    // Show create user form
public function create()
{
    $roles = Role::all(); // Get all roles from DB
    return view('Admin_Dashboard.Doctor.create', compact('roles'));
}

// Store new user
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|string|exists:roles,name',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    $user->assignRole($request->role);

    return redirect()->route('admin.users.index')
                     ->with('success', 'User created successfully with role: ' . $request->role);
}

}
