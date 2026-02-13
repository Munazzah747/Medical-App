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

        return redirect()->route('admin.doctor.index')
            ->with('success','Doctor created successfully');
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'specializations' => 'nullable|array',
            'specializations.*' => 'exists:specializations,id',
        ]);

        // Update doctor basic info
        $doctor->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // MANY-TO-MANY (pivot table)
        $doctor->specializations()->sync(
            $request->specializations ?? []
        );

        return redirect()->back()
            ->with('success', 'Doctor updated successfully');
    }

    /**
     * Toggle doctor active / inactive
     */
    public function status($id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->is_active = ! $doctor->is_active;
        $doctor->save();

        return redirect()->back()
            ->with('success', 'Doctor status updated');
    }

    /**
     * Delete doctor
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        // detach pivot data first (safe practice)
        $doctor->specializations()->detach();

        $doctor->delete();

        return redirect()->back()
            ->with('success', 'Doctor deleted successfully');
    }
}


