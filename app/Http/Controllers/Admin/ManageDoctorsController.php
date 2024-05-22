<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;


class ManageDoctorsController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Doctors';
        $doctors = Doctor::with('department', 'location')->paginate(getPaginate(3));
        return view('admin.doctor.index', compact('pageTitle', 'doctors'));
    }

    public function status($id,$column = 'status')
    {
        $query     = Doctor::findOrFail($id);
        $column = strtolower($column);
        if ($query->$column == Status::ENABLE) {
            $query->$column = Status::DISABLE;
        } else {
            $query->$column = Status::ENABLE;
        }
        $message   = keyToTitle($column). ' changed successfully';

        $query->save();
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function active()
    {
        $pageTitle = 'Active Doctors';
        $doctors = $this->commonQuery()->where('status', Status::ACTIVE)->paginate(getPaginate());
        return view('admin.doctor.index', compact('pageTitle', 'doctors'));
    }

    public function inactive()
    {
        $pageTitle = 'Inactive Doctors';
        $doctors = $this->commonQuery()->where('status', Status::INACTIVE)->paginate(getPaginate());
        return view('admin.doctor.index', compact('pageTitle', 'doctors'));
    }

    protected function commonQuery()
    {
        return Doctor::orderBy('id', 'DESC')->with('department', 'location');
    }

    public function featured($id, $column = 'status')
    {
        $query              = Doctor::findOrFail($id);
        $column             = strtolower($column);
        if ($query->$column == Status::ENABLE) {
            $query->$column = Status::DISABLE;
        } else {
            $query->$column = Status::ENABLE;
        }
        $message            = keyToTitle($column) . ' change successfully';

        $query->save();
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }



    public function form()
    {
        $pageTitle      = 'Add New Doctor';
        $departments    = Department::orderBy('name')->get();
        $locations       = Location::orderBy('name')->get();
        return view('admin.doctor.form', compact('pageTitle', 'departments', 'locations'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);

        if ($id) {
            $doctor     = Doctor::findOrFail($id);
            $notification   = 'Doctor Update succesfully';
        } else {
            $doctor    = new Doctor();
            $notification = 'Doctor Added Succesfully';
        }

        $this->doctorSave($doctor, $request);

        if (!$id) {
            $general = gs();
            notify($doctor, 'PEOPLE_CREDENTIAL', [
                'site_name'     => $general->site_name,
                'name'          => $doctor->name,
                'username'      => $doctor->username,
                'password'      => decrypt($doctor->password),
                'guard'         => route('doctor.login'),
            ]);
        }

        $notify[] = ['success', $notification];
        return redirect()->back()->withNotify($notify);
    }

    protected function validation($request, $id = 0)
    {
        $imageValidation = $id ? 'nullable' : 'required';
        $request->validate([
            'image'         => ["$imageValidation", 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'name'          => 'required|string|max:40',
            'username'      => 'required|string|max:40|min:6|unique:doctors,username,' . $id,
            'email'         => 'required|email|string|unique:doctors,email,' . $id,
            'mobile'        => 'required|numeric|unique:doctors,mobile,' . $id,
            'department'    => 'required||numeric|gt:0',
            'location'      => 'required||numeric|gt:0',
            'fees'          => 'required|numeric|gt:0',
            'qualification' => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'about'         => 'required|string|max:500',
        ]);
    }

    protected function doctorSave($doctor, $request)
    {
        if ($request->hasFile('image')) {
            try {
                $old = $doctor->image;
                $doctor->image = fileUploader($request->image, getFilePath('doctorProfile'), getFileSize('doctorProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $general = gs();
        $mobile = $general->country_code . $request->mobile;

        $doctor->name           = $request->name;
        $doctor->username       = $request->username;
        $doctor->email          = strtolower(trim($request->email));
        $doctor->password       = encrypt(passwordGen());
        $doctor->mobile         = $mobile;
        $doctor->department_id  = $request->department;
        $doctor->location_id    = $request->location;
        $doctor->qualification  = $request->qualification;
        $doctor->fees           = $request->fees;
        $doctor->address        = $request->address;
        $doctor->about          = $request->about;
        $doctor->save();
    }

    public function detail($id)
    {
        $pageTitle         = 'Doctor Detail - ';
        return view('admin.doctor.detail', compact('pageTitle'));
    }

}
