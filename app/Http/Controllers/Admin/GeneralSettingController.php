<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\GeneralSetting;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $pageTitle = 'General Setting';
        return view('admin.setting.general', compact('pageTitle'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name'     => 'required|string|max:40',
            'cur_text'      => 'required|string|max:40',
            'country_code'  => 'required'
        ]);
        
        $general = gs();
        $general->site_name   = $request->site_name;
        $general->cur_text     = $request->cur_text;
        $general->cur_sym      = $request->cur_sym;
        $general->country_code = $request->country_code;
        $general->save();

        $notify[] = ['Success', 'General setting updated successfully'];

    }
}
