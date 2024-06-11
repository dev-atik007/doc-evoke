<?php

namespace App\Http\Controllers\Assistant;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Assistant;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $pageTitle = 'Assistant of Doctors';
        $assistant = Auth::guard('assistant')->user();
        $doctors   = $assistant->doctors()->orderBy('name')->get();
        return view('assistant.doctor.index', compact('pageTitle', 'doctors'));
    }

    public function createFrom(Request $request)
    {
        $pageTitle = 'Choose Doctor';
        $assistant = Auth::guard('assistant')->user();
        $doctors   = $assistant->doctors()->orderBy('name')->get();
        return view('assistant.appointment.form', compact('pageTitle', 'doctors'));
    }

    public function details(Request $request)
    {
        $doctor  = Doctor::where('id', $request->doctor_id)->firstOrFail(); //If no records are found, a 404 page will be displayed via firstOrFail().
        $pageTitle = $doctor->name . ' - Booking Details';

        if (!$doctor->serial_or_slot) {
            $notify[] = ['error', 'No available schedule for this doctor!'];
            return back()->withNotify($notify);
        }

        $availableDate = [];
        $date          = Carbon::now(); //The current date is stored in $date
        for ($i = 0; $i < $doctor->serial_day; $i++) {
            array_push($availableDate, date('Y-m-d', strtotime($date)));
            $date->addDays(1); //Then the number of days $doctor->serial_day is added to the $availableDate array via a loop.
        }

        return view('assistant.appointment.booking', compact('pageTitle', 'doctor', 'availableDate'));
    }

    public function availability(Request $request)
    {
        $collection = Appointment::hasDoctor()
            ->where('doctor_id', $request->doctor_id)
            ->where('try', Status::YES)
            ->where('is_delete', Status::NO)
            ->whereDate('booking_date', Carbon::parse($request->date))->get();

        $data = collect([]);
        foreach ($collection as $value) {
            $data->push($value->time_serial);
        }
        return response()->json(@$data); //data is returned as response in JSON format.
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
        $appointment->doctor_id     = $doctor->id;
        $appointment->email         = $request->email;
        $appointment->mobile        = $request->mobile;
        $appointment->age           = $request->age;
        $appointment->disease       = $request->disease;


        $appointment->added_assistant_id = auth()->guard('assistant')->id();


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
                'disease'       => 'required|max:80',
            ],
            [
                'time_serial.required'  => 'You did not select any time or serial',
            ]
        );
    }
    
    public function newAppointment($id)
    {
        $doctor = Doctor::findOrFail($id);
        $appointments = Appointment::where('doctor_id', $doctor->id,)->where('is_complete',0)->latest()->with('doctor')->paginate(getPaginate(20));
        $pageTitle = $doctor->name . ' - ' . 'New Serial';

        return view('assistant.doctor.appointments', compact('pageTitle', 'appointments'));
    }


    public function appointmentCompleted($id)
    {
        $doctor  = Doctor::with(['appointments'=>function($q){
            $q->where('is_complete',1)->get();
        }])->where('id',$id)->first(); //Fetching the first matching record using the method.


        // dd($doctor);
        $pageTitle      = $doctor->name . ' - ' . 'Done Appointments';

        return view('assistant.doctor.doneService', compact('pageTitle','doctor'));
    }

    public function doneService ($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->is_complete = 1;
        $appointment->payment_status = 1;
        $appointment->save();

        $pageTitle      = 'Done Appointments';
        $notify[] = ['success', 'Appointment service done successfully'];

        return back()->withNotify($notify);
    }


    public function serviceTrashed($id)
    {
        $pageTitle = 'Trashed Appointments';
    
        $doctor = Doctor::with(['appointments' => function($query) {
            $query->where('is_delete', 1);
        }])->where('id', $id)->first(); 
        
        $appointments = $doctor->appointments()->paginate(getPaginate(20));
        
        return view('assistant.doctor.appointments', compact('pageTitle', 'appointments'));
    }

    public function remove($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->is_delete || $appointment->payment_status) {
            $notify[] = ['error', 'Appointment trashed operation is invalid'];
            return back()->withNotify($notify);
        }

        $appointment->is_delete = Status::YES;

        $appointment->delete_by_assistant = auth()->guard('assistant')->id();

        $appointment->save();


        $notify[] = ['success', 'Appointment service is trashed successfully'];
        
        return back()->withNotify($notify);
    }


}
