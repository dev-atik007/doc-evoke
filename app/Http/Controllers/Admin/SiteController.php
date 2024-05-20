<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerSection;
use App\Models\ContactForm;
use App\Models\Description;
use App\Models\footer;
use App\Models\subscribe;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function BannerSection()
    {
        $pageTitle = 'Banner Section';
        $bannerSection = BannerSection::first();
        return view('admin.frontend.banner.index', compact('pageTitle', 'bannerSection'));
    }

    public function bannerStore(Request $request, $id = 0)
    {
        $imageValidation = $id ? 'nullable' : 'required';
        $request->validate([
            'image'         => ["$imageValidation", new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'heading'       => 'required|max:40',
            'sub_heading'   => 'required|max:100',
        ]);

        if($id) {
            $bannerSection = BannerSection::findOrFail($id);
            $notification  = 'Banner Section updated successfully';
        } else {
            $bannerSection = new BannerSection();
            $notification  = 'Banner Section Added successfully';
        }
       
        if($request->hasFile('image')) {
            
            try {
                $bannerSection->image = fileUploader($request->image, getFilePath('banner'), null, @$bannerSection->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload category image'];
                return back()->withNotify($notify);
            }
            
        }

        $bannerSection->heading     = $request->heading;
        $bannerSection->subheading  = $request->sub_heading;
        $bannerSection->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }
    
    public function bannerUpdate(Request $request, $id)
    {
        dd($request->all());
    }

    public function contact()
    {
        $pageTitle = 'contact Us';
        $bannerSections = BannerSection::first();
        return view('admin.frontend.contact.index', compact('pageTitle', 'bannerSections'));
    }

    public function contactUpdate(Request $request, $id)
    {
        $request->validate([
            'email'     => 'required|max:40',
            'phone'     => 'required|max:40'
        ]);

        $bannerSections = BannerSection::find($id);

        $bannerSections->email = $request->email;
        $bannerSections->phone = $request->phone;
        $bannerSections->save();

        $notify[] = ['success', 'Contact updated successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function subscribe()
    {
        $pageTitle = 'User Subscribe List';
        $subscribes = subscribe::latest()->paginate(getPaginate());
        return view('admin.frontend.subscribe.list', compact('pageTitle', 'subscribes'));
    }

    public function userSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscribe       = new subscribe();
        $subscribe->email = $request->email;
        $subscribe->save();

        $notify[] = ['success', 'Thanks for your subscribe'];
        return redirect()->back()->withNotify($notify);
    }


    public function info()
    {
        $pageTitle = 'Footer Location Details';
        $footer = footer::first();
        return view('admin.frontend.location.info', compact('pageTitle', 'footer'));      
    }

    public function footerSection(Request $request, $id)
    {
        $request->validate([
            'street'    => 'required|max:40',
            'city'      => 'required|max:40',
            'country'   => 'required|max:40',
            'newsletter'=> 'required|max:200',
        ]);

        $footer =  footer::find($id);

        $footer->street     = $request->street;
        $footer->city       = $request->city;
        $footer->country    = $request->country;
        $footer->newsletter = $request->newsletter;
        $footer->save();

        $notify[] = ['success', 'Footer updated successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function index()
    {
        $pageTitle = 'Contact form index';
        $contactData = ContactForm::latest()->paginate(getPaginate());
        return view('admin.frontend.form_contact.index', compact('pageTitle', 'contactData'));
    }

    public function contactFormUser(Request $request)
    {
       
        $request->validate([
            'name'      => 'required|max:20',
            'number'    => 'required|max:40',
            'subject'   => 'required|max:40',
            'message'   => 'required',
        ]);
        
        $contactData = new ContactForm();

        $contactData->name      = $request->name;
        $contactData->number    = $request->number;
        $contactData->subject   = $request->subject;
        $contactData->message   = $request->message;
        $contactData->save();

        $notify[] = ['success', 'Your message has been sent. Thank you!'];
        return redirect()->back()->withNotify($notify);

    }

    public function delete($id)
    {
        $delete = ContactForm::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }

        $notify[] = ['error', 'Data delete successfully!'];
        return redirect()->back()->withNotify($notify);
    }

    public function description()
    {
        $pageTitle = 'All footer description';
        $description = Description::first();
        return view('admin.frontend.section_all.description', compact('pageTitle', 'description'));
    }

    public function sectionUpdate(Request $request, $id)
    {
        $request->validate([
            'service'       => 'required',
            'appointment'   => 'required',
            'department'    => 'required',
            'doctor'        => 'required',
            'frequently'    => 'required',
            'gallery'       => 'required',
            'contact'       => 'required',
        ]);

        $footer =  Description::find($id);

        $footer->service      = $request->service;
        $footer->appointment  = $request->appointment;
        $footer->department   = $request->department;
        $footer->doctor       = $request->doctor;
        $footer->frequently   = $request->frequently;
        $footer->gallery      = $request->gallery;
        $footer->contact      = $request->contact;
        $footer->save();

        $notify[] = ['success', 'Section description updated successfully'];
        return redirect()->back()->withNotify($notify);
    }

    

    
}
