<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Assistant;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Models\Doctor;
use App\Traits\GlobalStatus;




class ManageAssistantsController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Assistants';
        $assistants = Assistant::with('doctor')->paginate(getPaginate(5));
        return view('admin.assistant.index', compact('pageTitle', 'assistants'));
    }

    public function status($id, $column = 'status')
    {
        $query  = Assistant::findOrFail($id);
        $column = strtolower($column);
        if ($query->$column == Status::ENABLE) {
            $query->$column = Status::DISABLE;
        } else {
            $query->$column = Status::ENABLE;
        }
        $message = keyToTitle($column) . ' change Successfully';
        $query->save();
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function active()
    {
        $pageTitle = 'Active Assistants';
        $assistants = $this->commonQuery()->where('status', Status::ACTIVE)->paginate(getPaginate());
        return view('admin.assistant.index', compact('pageTitle','assistants'));
    }

    public function inactive()
    {
        $pageTitle = 'Inactive Assistants';
        $assistants = $this->commonQuery()->where('status', Status::INACTIVE)->paginate(getPaginate());
        return view('admin.assistant.index', compact('pageTitle', 'assistants'));
    }
    
    protected function commonQuery()
    {
        return Assistant::orderBy('id', 'DESC')->with('department', 'location');
    }

    public function form()
    {
        $pageTitle = 'Add New Assistant';
        $doctors   = Doctor::orderBy('name')->get();
        return view('admin.assistant.form', compact('pageTitle', 'doctors'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);
        if ($id) {
            $assistant      = Assistant::findOrFail();
            $notification   = 'Assistant updated successfully';
        } else {
            $assistant      = new Assistant();
            $notification   = 'Assistant added successfully';
        }
        
        $this->assistantSave($assistant, $request);
        
        if (!$id) {
            $general =gs();
            notify($assistant, 'PEOPLE_CREDENTIAL', [
                'nite_name'     => $general->nite_name,
                'name'          => $assistant->name,
                'username'      => $assistant->username,
                'password'      => decrypt($assistant->password),
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
            'image'     => ["$imageValidation", 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'name'      => 'required|string|max:40',
            'username'  => 'required|string|max:40|min:6|unique:assistants,username,' .$id,
            'email'     => 'required|email|string|unique:assistants,email,' . $id,
            'mobile'    => 'required|numeric|unique:assistants,mobile,' . $id,
            'address'   => 'nullable|string|max:255',
        ]);
    }

    protected function assistantSave($assistant, $request)
    {
        $doctors = Doctor::findOrFail($request->doctor_id);

        if ($request->hasFile('image')) {
            try {
                $old = $assistant->image;
                $assistant->image = fileUploader($request->image, getFilePath('assistantProfile'), getFileSize('assistantProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $general = gs();
        $mobile = $general->country_code . $request->mobile;

        $assistant->name        = $request->name;
        $assistant->username    = $request->username;
        $assistant->email       = strtolower(trim($request->email));
        $assistant->password    = encrypt(passwordGen());
        $assistant->mobile      = $mobile;
        $assistant->address     = $request->address;
        $assistant->save();
        
    }

    public function detail($id)
    {
        $pageTitle         = 'Assistant Detail - ';
        return view('admin.assistant.detail', compact('pageTitle'));
    }

}
