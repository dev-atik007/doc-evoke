<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
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
        $staffs = Staff::latest()->paginate(getPaginate(5));
        return view('admin.staff.index', compact('pageTitle', 'staffs'));
    }

    public function status($id, $column = 'status')
    {
        $query   = Staff::findOrFail($id);
        $column  = strtolower($column);
        if ($query->$column == Status::ENABLE) {
            $query->$column = Status::DISABLE;
        } else {
            $query->$column = Status::ENABLE;
        }
        $message = keyToTitle($column). ' changed successfully';

        $query->save();
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function active()
    {
        $pageTitle = 'Active Staff';
        $staffs = $this->commonQuery()->where('status', Status::ACTIVE)->paginate(getPaginate());
        return view('admin.staff.index', compact('pageTitle', 'staffs'));
    }

    public function inactive()
    {
        $pageTitle = 'Inactive Staff';
        $staffs = $this->commonQuery()->where('status', status::INACTIVE)->paginate(getPaginate());
        return view('admin.staff.index', compact('pageTitle', 'staffs'));
    }

    protected function commonQuery()
    {
        return Staff::orderBy('id', 'DESC')->with('department', 'location');
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

        if (!$id) {
            $general = gs();
            notify($staff, 'PEOPLE_CREDENTIAL', [
                'site_name'     => $general->site_name,
                'name'          => $staff->name,
                'username'      => $staff->username,
                'password'      => decrypt($staff->password),
                'guard'         => route('admin.login'),
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
            'username'  => 'required|string|max:40|min:6|unique:staff,username,' .$id,
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

    public function detail($id) 
    {
        $pageTitle  = 'Staff Detail - ';
        return view('admin.staff.detail', compact('pageTitle'));
    }
}
