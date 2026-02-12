<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorAvailabilityController extends Controller
{
    public function store(Request $request, $doctorId)
    {
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        DoctorAvailability::create([
            'doctor_id' => $doctorId,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return back()->with('success','Availability added');
    }
}
