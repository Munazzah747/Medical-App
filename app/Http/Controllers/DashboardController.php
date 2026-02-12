<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return view('Admin_Dashboard.dashboard');
        }

        if ($user->hasRole('doctor')) {
            return view('dashboard.doctor');
        }

        return view('User_Dashboard.dashboard');
}
}

