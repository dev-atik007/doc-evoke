<?php

namespace App\Http\Controllers\Staff;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function new()
    {
        $pageTitle = 'New Appointment';
        $appointments = Appointment::with('doctor')->latest()->paginate(getPaginate(20));
        return view('staff.appointment.new', compact('pageTitle', 'appointments'));
    }

    public function form()
    {
        $pageTitle = 'Choose Doctor';
        $doctors = Doctor::orderBy('name')->get();
        return view('staff.appointment.form', compact('pageTitle', 'doctors'));
    }

    public function details(Request $request)
    {
        $doctor = Doctor::where('id', $request->doctor_id)->firstOrFail();
        $pageTitle = $doctor->name . ' - Doctor Details';

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

        return view('staff.appointment.booking', compact('pageTitle', 'doctor', 'availableDate'));
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
        $mobile  = $general->country_code .$request->mobile;

        $appointment                = new Appointment();
        $appointment->booking_date  = Carbon::parse($request->booking_date)->format('Y-m-d');
        $appointment->time_serial   = $request->time_serial;      
        $appointment->name          = $request->name;
        $appointment->email         = $request->email;
        $appointment->mobile        = $mobile;
        $appointment->age           = $request->age;
        $appointment->doctor_id     = $doctor->id;
        $appointment->disease       = $request->disease;  

        $appointment->added_staff_id = auth()->guard('staff')->id();

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
                'disease'       => 'required|max:40',
            ],
            [
                'time_serial.required'  => 'You did not select any time or serial',
            ]
        );
    }
}
