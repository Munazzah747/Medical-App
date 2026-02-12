<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
//     public function create()
// {
//     return view('Admin_Dashboard.Doctor.create');
// }
   

//    public function store(Request $request)
// {
//     $request->validate([
//         'name'     => 'required|string|max:255',
//         'email'    => 'required|email|unique:users,email',
//         'password' => 'required|min:6',
//         'role'     => 'required|exists:roles,name',
//     ]);

//     $user = User::create([
//         'name'      => $request->name,
//         'email'     => $request->email,
//         'password'  => Hash::make($request->password),
//         'is_active' => true,
//     ]);

//     // Assign selected role
//     $user->assignRole($request->role);

//     return redirect()
//         ->route('admin.doctors.create')
//         ->with('success', 'User created successfully with role assigned.');
// }

public function index()
    {
        $doctors = Doctor::with('specializations')->get();
    $specializations = Specialization::all();

    return view('Admin_Dashboard.Doctor_Management.index', compact('doctors','specializations'));
    }

    public function create()
    {
        $specializations = Specialization::all();
        return view('Admin_Dashboard.Doctor_Management.form', compact('specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'specializations' => 'required|array'
        ]);

        $doctor = Doctor::create($request->only('name','email','phone'));

        // attach specializations
        $doctor->specializations()->sync($request->specializations);

        return redirect()->route('admin.Doctor_Management.index')
            ->with('success','Doctor created successfully');
    }
}


