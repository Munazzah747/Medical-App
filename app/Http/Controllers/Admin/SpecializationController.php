<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $specializations = Specialization::all();
        return view('Admin_Dashboard.Doctor_specialization.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin_Dashboard.Doctor_specialization.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
        $request->validate([
            'name' => 'required|string|max:255|unique:specializations,name'
        ]);

        Specialization::create([
            'name' => $request->name
        ]);

        return redirect()->route('specializations.index')
            ->with('success', 'Specialization created successfully');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialization $specialization)
    {
        {
        $request->validate([
            'name' => 'required|string|max:255|unique:specializations,name,' . $specialization->id
        ]);

        $specialization->update([
            'name' => $request->name
        ]);

        return redirect()->route('specializations.index')
            ->with('success', 'Specialization updated successfully');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        $specialization->delete();

        return redirect()->route('specializations.index')
            ->with('success', 'Specialization deleted successfully');
    }
}
