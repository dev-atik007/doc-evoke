<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Doctor Dashboard';
        return view('doctor.dashboard', compact('pageTitle'));
    }
}
