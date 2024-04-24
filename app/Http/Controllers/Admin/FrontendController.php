<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function templates()
    {
        $pageTitle = 'Templates';
        $temPaths = array_filter(glob('resources/views/templates/*'), 'is_dir');
        foreach ($temPaths as $key => $temp) {
            $aar = explode('/', $temp);
            $tempname = end($aar);
            $templates[$key]['name'] = $tempname;
            $templates[$key]['image'] = asset($temp) . '/preview.jpg';
        }
        return view('templates.layouts.frontend', compact('pageTitle', 'templates'));
    }
}
