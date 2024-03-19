<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Models\Staff;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class ManageStaffsController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Staffs';
        $staffs = Staff::latest()->paginate(getPaginate(1));
        return view('admin.staff.index', compact('pageTitle', 'staffs'));
    }

    public function form()
    {
        $pageTitle = 'Add New Staff';
        return view('admin.staff.form', compact('pageTitle'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);
        if ($id) {
            $staff          = Staff::findOrFail();
            $notification   = 'Staff updated successfully';
        } else {
            $staff          = new Staff();
            $notification   = 'Staff added successfully';
        }
        $this->staffSave($staff, $request);
        if ($id) {
            $general = gs();
            notify($staff, 'PEOPLE_CREDENTIAL', [
                'site_name'     => $general->site_name,
                'name'          => $staff->name,
                'username'      => $staff->username,
                'password'      => decrypt($staff->password),
                'guard'         => route('staff.login'),
            ]);
            $notify[] = ['success', $notification];
            return redirect()->back()->withNotify($notify);
        }
    }

    protected function validation($request, $id = 0)
    {
        $imageValidation = $id ? 'nullable' : 'required';
        $request->validate([
            'image'     => ["$imageValidation", 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'name'      => 'required|string|max:40',
            'username'  => 'required|string|max:40',
            'email'     => 'required|email|string|unique:staff,email,' . $id,
            'mobile'    => 'required|numeric|unique:staff,mobile,' . $id,
            'address'   => 'nullable|string|max:255',
        ]);
    }

    protected function staffSave($staff, $request)
    {
        if ($request->hasFile('image')) {
            try {
                $old = $staff->image;
                $staff->image = fileUploader($request->image, getFilePath('staffProfile'), getFileSize('staffProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Coudn\t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $general = gs();
        $mobile = $general->country_code . $request->mobile;

        $staff->name        = $request->name;
        $staff->username    = $request->username;
        $staff->email       = strtolower(trim($request->email));
        $staff->password    = encrypt(passwordGen());
        $staff->mobile      = $mobile;
        $staff->save();
    }
}
