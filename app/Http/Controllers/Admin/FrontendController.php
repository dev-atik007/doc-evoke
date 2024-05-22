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
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function templates()
    {
        $pageTitle = 'Templates';
        $departments            = Department::orderBy('name')->get();
        $locations              = Location::orderBy('name')->get();
        $bannerSections         = BannerSection::first();
        $total_doctor           = Doctor::all()->count();
        $total_department       = Department::all()->count();
        $footer_section         = footer::first();
        $sections_description   = Description::first();
        $doctors = Doctor::with('department', 'location')->limit(4)->inRandomOrder()->get();
        $services = Service::limit(6)->inRandomOrder()->get();
        $testimonials = Testimonial::orderBy('name')->get();
        return view('templates.layouts.frontend', compact('pageTitle', 'departments', 'bannerSections', 'total_doctor', 'total_department','locations', 'footer_section',
        'sections_description', 'doctors', 'services','testimonials'));
    }



    public function singleDoctor()
    {
        return view('templates.layouts.singlePage');
    }
}
