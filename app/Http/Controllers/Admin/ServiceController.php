<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $pageTitle = 'Service Index page';
        $services = Service::latest()->paginate(getPaginate());
        return view('admin.service.index', compact('pageTitle', 'services'));
    }

    public function form()
    {
        $pageTitle = 'Service Form Page';
        return view('admin.service.form', compact('pageTitle'));
    }

    public function serviceStore(Request $request)
    {
        $request->validate([
            'icon'          => 'required|string',
            'title'         => 'required|max:100',
            'description'   => 'required',
        ]);
        
        $service = new Service();

        $service->icon          = $request->icon;
        $service->title         = $request->title;
        $service->description   = $request->description;
        $service->save();

        $notify[] = ['success', 'New Service store succesfully!'];
        return redirect()->back()->withNotify($notify);
    }
}
