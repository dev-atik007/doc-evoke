<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Constants\Status;

class AppointmentController extends Controller
{
    public function index()
    {
        $pageTitle = 'All New Appointments';
        $appointments = Appointment::latest()->paginate(getPaginate(20));
        return view('admin.appointment.index', compact('pageTitle', 'appointments'));
    }

    public function form()
    {
        // $ab =0;
        // if($ab == 0){
        //     return p;

        // }else{
        //     return u;
        // }
        // $ab == 0? 'p':'u';
        $pageTitle = 'Make Appointment';
        $doctors = Doctor::orderBy('name')->get();
    
        return view('admin.appointment.form', compact('pageTitle', 'doctors'));
    }

    public function details(Request $request)
    {
        $doctor = Doctor::where('id', $request->doctor_id)->firstOrFail();
        $pageTitle = $doctor->name . ' - Details';

        
        if(!$doctor->serial_or_slot) {
            $notify[] = ['error', 'No available schedule for this doctor!'];
            return back()->withNotify($notify);
        }

        $availableDate = [];
        $date          = Carbon::now();
        for ($i = 0; $i < $doctor->serial_day; $i++) {
            array_push($availableDate, date('Y-m-d', strtotime($date)));
            $date->addDays(1);
        }
        return view('admin.appointment.booking', compact('pageTitle', 'doctor', 'availableDate'));
    }

    public function availability(Request $request)
    {
        $collection = Appointment::hasDoctor()->where('doctor_id', $request->doctor_id)->where('try', Status::YES)->where('is_delete', Status::NO)->whereDate('booking_date', Carbon::parse($request->date))->get();

        $data = collect([]);
        foreach ($collection as $value) {
            $data->push($value->time_serial);
        }
        return response()->json(@$data);
    }

    public function store(Request $request, $id)
    {
        $this->validation($request);

        $doctor = Doctor::find($id);

        $general = gs();
        $mobile  = $general->country_code . $request->mobile;

        $appointment                = new Appointment();
        $appointment->booking_date  = Carbon::parse($request->booking_date)->format('Y-m-d');
        $appointment->time_serial   = $request->time_serial;
        $appointment->name          = $request->name;
        $appointment->email         = $request->email;
        $appointment->mobile         = $mobile;
        $appointment->age           = $request->age;
        $appointment->doctor_id     = $doctor->id;
        $appointment->disease       = $request->disease;

        $appointment->added_admin_id = auth()->guard('admin')->id();

        $appointment->save();

        $notify[] = ['success', 'New Appointment make successfully'];
        return back()->withNotify($notify);
    }

    protected function validation($request)
    {
        $request->validate(
            [
                'name'          => 'required|max:40',
                'booking_date'  => 'required|date',
                'time_serial'   => 'required',
                'email'         => 'required|email',
                'mobile'        => 'required|max:40',
                'age'           => 'required|integer|gt:0',
            ],
            [
                'time_serial.required'  =>  'You did not select any time or serial',
            ]
        );
    }

    




    
}
