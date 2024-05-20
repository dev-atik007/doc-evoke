<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerSection;
use App\Models\Department;
use App\Models\Description;
use App\Models\Doctor;
use App\Models\footer;
use App\Models\GeneralSetting;
use App\Models\Location;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function templates()
    {
        $pageTitle = 'Templates';
        $departments = Department::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        $bannerSections = BannerSection::first();
        $total_doctor = Doctor::all()->count();
        $total_department = Department::all()->count();
        $footer_section = footer::first();
        $sections_description = Description::first();
        return view('templates.layouts.frontend', compact('pageTitle', 'departments', 'bannerSections', 'total_doctor', 'total_department','locations', 'footer_section',
    'sections_description'));
    }

    function contact() {
        dd('Contact page');
    }

    public function singleDoctor()
    {
        return view('templates.layouts.singlePage');
    }
}
