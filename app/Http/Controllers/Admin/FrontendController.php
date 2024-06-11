<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Appointment;
use App\Models\BannerSection;
use App\Models\Department;
use App\Models\Description;
use App\Models\Doctor;
use App\Models\footer;
use App\Models\Frequently;
use App\Models\Gallery;
use App\Models\GeneralSetting;
use App\Models\Location;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\WhyChoose;
use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function templates()
    {
        $pageTitle = 'Templates';
        $departments            = Department::orderBy('name')->with('doctors')->get();
        $locations              = Location::orderBy('name')->get();
        $bannerSections         = BannerSection::first();
        $total_doctor           = Doctor::all()->count();
        $total_department       = Department::all()->count();
        $footer_section         = footer::first();
        $sections_description   = Description::first();
        $doctors                = Doctor::with('department', 'location')->limit(4)->inRandomOrder()->get();
        $services               = Service::limit(6)->inRandomOrder()->get();
        $testimonials           = Testimonial::orderBy('name')->get();
        $frenquently            = Frequently::limit(4)->inRandomOrder()->get();
        $whyChoose              = WhyChoose::limit(3)->inRandomOrder()->get();
        $aboutSection           = AboutSection::limit(3)->inRandomOrder()->get();
        $gallery                = Gallery::limit(8)->inRandomOrder()->get();
        $video                  = Video::first();
        // $doctors             = Doctor::orderBy('name')->get();
        return view('templates.layouts.frontend', compact(
            'pageTitle',
            'departments',
            'bannerSections',
            'total_doctor',
            'total_department',
            'locations',
            'footer_section',
            'sections_description',
            'doctors',
            'services',
            'testimonials',
            'frenquently',
            'whyChoose',
            'aboutSection',
            'gallery',
            'video'
        ));
    }

    // frequently section
    public function frequently()
    {
        $pageTitle = 'Frequently index page';
        $frenquently = Frequently::latest()->get();
        return view('admin.frontend.frequently.index', compact('pageTitle', 'frenquently'));
    }

    public function frequentlyStore(Request $request)
    {
        $request->validate([
            'question'  => 'required|string|max:100',
            'answer'    => 'required',
        ]);

        $frenquently = new Frequently();

        $frenquently->questions = $request->question;
        $frenquently->answer    = $request->answer;
        $frenquently->save();

        $notify[] = ['success', 'Well done! Your data has been successfully submitted.'];
        return redirect()->back()->withNotify($notify);
    }

    public function frequentlyUpdate(Request $request, $id)
    {
        $request->validate([
            'question'  => 'required|string|max:100',
            'answer'    => 'required',
        ]);

        $frenquently = Frequently::find($id);

        $frenquently->questions = $request->question;
        $frenquently->answer    = $request->answer;
        $frenquently->save();

        $notify[] = ['success', 'Great! Frequently has been updated successfully.'];
        return redirect()->back()->withNotify($notify);
    }

    // Why choose section
    public function index()
    {
        $pageTitle = 'Why choose form and index';
        $whyChoose = WhyChoose::first();
        $whyChooseIndex = WhyChoose::latest()->get()->skip(1);
        return view('admin.frontend.why_choose.index', compact('pageTitle', 'whyChoose', 'whyChooseIndex'));
    }

    public function chooseForm()
    {
        $pageTitle = 'Choose details form';
        return view('admin.frontend.why_choose.form', compact('pageTitle'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);

        if ($id) {
            $whyChoose      = WhyChoose::findOrFail($id);
            $notification   = 'Why Choose section updated successfully';
        } else {
            $whyChoose      = new WhyChoose();
            $notification   = 'Why choose  Added Successfully';
        }

        $whyChoose->icon    = $request->icon;
        $whyChoose->heading = $request->heading;
        $whyChoose->details = $request->details;
        $whyChoose->save();

        $notify[] = ['success', 'Testination data successfully uploded!'];
        return to_route('why.choose')->withNotify($notify);
    }

    protected function validation($request, $id = 0)
    {
        $request->validate(
            [
                'icon'      => 'required|string|max:40',
                'heading'   => 'required|string|max:40',
                'details'   => 'required|string|max:100',
            ],
        );
    }

    public function chooseEdit($id)
    {
        $pageTitle = 'why choose update form';
        $data = WhyChoose::find($id);
        return view('admin.frontend.why_choose.edit', compact('pageTitle', 'data'));
    }

    public function chooseUpdate(Request $request, $id)
    {
        $request->validate([
            'icon'       => 'nullable|string|max:40',
            'heading'    => 'nullable|string|max:40',
            'details'    => 'nullable|string|max:100',
        ]);

        $whyChoose = WhyChoose::find($id);

        $whyChoose->icon        = $request->icon;
        $whyChoose->heading     = $request->heading;
        $whyChoose->details     = $request->details;
        $whyChoose->save();

        $notify[] = ['success', 'Great! Why choose has been updated successfully.'];
        return redirect()->back()->withNotify($notify);
    }

    // About section
    public function aboutIndex()
    {
        $pageTitle = 'About section list';
        $aboutSection = AboutSection::latest()->get();
        return view('admin.frontend.about.index', compact('pageTitle', 'aboutSection'));
    }

    public function aboutForm()
    {
        $pageTitle = 'About section form';
        return view('admin.frontend.about.form', compact('pageTitle'));
    }

    public function aboutStore(Request $request, $id = 0)
    {
        $request->validate(
            [
                'icon'      => 'required|string|max:40',
                'name'   => 'required|string|max:40',
                'about'   => 'required|string|max:255',
            ],
        );

        if ($id) {
            $aboutSection   = AboutSection::findOrFail($id);
            $notification   = 'Why Choose section updated successfully';
        } else {
            $aboutSection   = new AboutSection();
            $notification   = 'Why choose  Added Successfully';
        }

        $aboutSection = new AboutSection();

        $aboutSection->icon = $request->icon;
        $aboutSection->name = $request->name;
        $aboutSection->about = $request->about;
        $aboutSection->save();

        $notify[] = ['success', 'About Section data successfully uploded!'];
        return to_route('about.section')->withNotify($notify);
    }

    public function aboutEdit($id)
    {
        $pageTitle = 'About section update form';
        $aboutEdit = AboutSection::find($id);
        return view('admin.frontend.about.edit', compact('pageTitle', 'aboutEdit'));
    }

    public function aboutUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'icon'      => 'required|string|max:40',
                'name'   => 'required|string|max:40',
                'about'   => 'required|string|max:255',
            ],
        );

        $aboutUpdate = AboutSection::find($id);

        $aboutUpdate->icon = $request->icon;
        $aboutUpdate->name = $request->name;
        $aboutUpdate->about = $request->about;
        $aboutUpdate->save();

        $notify[] = ['success', 'Great! About Section has been updated successfully.'];
        return redirect()->back()->withNotify($notify);
    }

    public function aboutDelete($id)
    {
        $delete = AboutSection::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
        $notify[] = ['success', 'Data delete successfully!'];
        return redirect()->back()->withNotify($notify);
    }

    // Gallery Sction
    public function galleryIndex()
    {
        $pageTitle = 'Galley list';
        $gallery = Gallery::latest()->get();
        return view('admin.frontend.gallery.index', compact('pageTitle', 'gallery'));
    }

    public function galleryStore(Request $request, $id = 0)
    {
        $imageValidation = $id ? 'nullabe' : 'required';

        $request->validate([
            'image'  => ["$imageValidation", 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $gallery     = new Gallery();
        if ($request->hasFile('image')) {

            try {
                $gallery->image = fileUploader($request->image, getFilePath('gallery'), getFileSize('gallery'), @$gallery->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload category image'];
                return back()->withNotify($notify);
            }
        }

        $gallery->save();

        $notify[] = ['success', 'Gallery Image successfully uploded!'];
        return to_route('gallery.index')->withNotify($notify);
    }

    //video content
    public function videoContent()
    {
        $pageTitle = 'video url section';
        $video = Video::first();
        return view('admin.frontend.video.index', compact('pageTitle', 'video'));
    }

    public function videoUpdate(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|max:255',
        ]);

        $video = Video::find($id);

        $video->url = $request->name;
        $video->save();

        $notify[] = ['success', 'Video url successfully uploded!'];
        return to_route('video.content')->withNotify($notify);

    }

    // Department Section
    public function getDoctorsByDepartment($department)
    {
        $doctors = Doctor::where('department_id', $department)->get();
        return response()->json($doctors);
    }

    public function appointmentStore(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:40',
            'email'         => 'required|email',
            'phone'         => 'required|max:40',
            'date'          => 'required|date',
            'department'    => 'required',
            'doctor_id'     => 'required',
            'message'       => 'nullable|max:255',
        ]);

        $gateways = ($request->payment_system == 1) ? Status::YES : Status::NO;
        $general  = gs();
        $mobile   = $general->country_code . $request->phone;

        $siteAppointment = new Appointment();

        $siteAppointment->name          = $request->name;
        $siteAppointment->email         = $request->email;
        $siteAppointment->mobile        = $mobile;
        $siteAppointment->booking_date  = Carbon::parse($request->date)->format('Y-m-d');
        $siteAppointment->doctor_id    = $request->doctor_id;
        $siteAppointment->disease       = $request->message;
        $siteAppointment->try           = $gateways ? Status::NO : STATUS::YES;
        $siteAppointment->trx           = $gateways ? getTrx() : Null;

        $siteAppointment->site = Status::YES;

        $siteAppointment->save();

        $notify[] = ['success', 'New Appointment booking successfully!'];
        return redirect()->back()->withNotify($notify);
    }

    public function singlePage()
    {
        return view('templates.singlePage.appointment');
    }
}
