<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function templates()
    {
        $pageTitle = 'Templates';
        $departments = Department::orderBy('name')->get();

        return view('templates.layouts.frontend', compact('pageTitle', 'departments'));
    }

    public function singleDoctor()
    {
        return view('templates.layouts.singlePage');
    }
}
