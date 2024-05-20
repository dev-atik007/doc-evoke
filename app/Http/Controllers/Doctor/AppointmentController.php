<?php

namespace App\Http\Controllers\Doctor;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
   
    public function index()
    {
        $pageTitle = 'All New Appointment';
        $doctor = auth()->guard('doctor')->user();
        $appointments = Appointment::where('doctor_id', $doctor->id)->latest()->with('doctor')->paginate(getPaginate(5));
        return view('doctor.appointment.index', compact('pageTitle', 'appointments'));
    }

    public function booking(Request $request)
    {
        
        $doctor = auth()->guard('doctor')->user();
        $pageTitle = "Details";

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

        return view('doctor.appointment.booking', compact('doctor','pageTitle', 'availableDate'));

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
        $mobile = $general->country_code . $request->mobile;

        $appointment                = new Appointment();
        $appointment->booking_date  = Carbon::parse($request->booking_date)->format('Y-m-d');
        $appointment->time_serial   = $request->time_serial;
        $appointment->name          = $request->name;
        $appointment->email         = $request->email;
        $appointment->mobile        = $mobile;
        $appointment->age           = $request->age;
        $appointment->doctor_id     = $doctor->id;
        $appointment->disease       = $request->disease;

        $appointment->added_doctor_id = auth()->guard('doctor')->id();

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
                'time_serial.required' => 'You did not select any time or serial',
            ]
        );
    }

    public function done($id)
    {
        $appointment = Appointment::findOrFail();

        if ($appointment->is_complete == Status::APPOINTMENT_INCOMPLETE && $appointment->payment_status != Status::APPOINTMENT_PAID_PAYMENT) {
            $appointment->is_complete == Status::APPOINTMENT_COMPLETE;

            if ($appointment->payment_status == Status::APPOINTMENT_CASH_PAYMENT) {
                $doctor = Doctor::findOrFail($appointment->doctor->id);
                $doctor->balance += $doctor->fees;
                $doctor->save();
                $appointment->payment_status = Status::APPOINTMENT_PAID_PAYMENT;
            }

            $appointment->save();
            $notify[] = ['success', 'Appointed service is done successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Something is wrong!'];
            return back()->withNotify($notify);
        }
    }
    

    public function appointmentCompleted()
    {
        // $doctor = Doctor::with(['appointments'=>function($query) {
        //     $query->where('is_complete',1)->get();
        // }])->where('id', $id)->first();

        $doctor = auth()->guard('doctor')->user();
         $appointments = $doctor->isCompleteappointments;
// dd($doctor);
        $pageTitle = 'Done Appointment';
        return view('doctor.appointment.doneService', compact('pageTitle','appointments'));
    }

    public function doneService(Request $request, $id)
    {
        $appointment = Appointment::findOrFail();
        $appointment->is_complete = 1;
        $appointment->payment_status = 1;
        $appointment->save();

        $pageTitle      = 'Done Appointments';
        $notify[] = ['success', 'Appoinment Success'];
        return back()->withNotify($notify);
    }

   
   
   

    
}
