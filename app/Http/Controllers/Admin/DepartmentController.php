<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Location;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

use function App\Http\Controllers\Helpers\fileUploader;
use function App\Http\Controllers\Helpers\getFilePath;
use function App\Http\Controllers\Helpers\getFileSize;
use function App\Http\Controllers\Helpers\getPaginate;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.department.index');
    }

    public function store(Request $request, $id = 0)
    {

        $imageValidation = $id ? 'nullabe' : 'required';
        $request->validate([
            'name'      => 'required|unique:departments|max:40',
            'details'   => 'required|max:255',
            'image'     => ["$imageValidation", new FileTypeValidate(['jpg', 'png', 'jpeg'])],
        ]);

        if ($id) {
            $department     = Department::findOrFail($id);
            $notification   = 'Department updated successfully';
        } else {
            $department     = new Department();
            $notification   = 'Department Added Successfully';
        }

        if ($request->hasFile('image')) {
            try {
                $department->image = fileUploader($request->image, getFilePath('department'), getFileSize('department'), @$department->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload category image'];
                return back()->withNotify($notify);
            }
        }

        $department->name   = $request->name;
        $department->details = $request->details;
        $department->save();
        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function location()
    {
        $pageTitle = 'All Departments';
        $locations = Location::paginate(getPaginate());
        return view('admin.location.index', compact('pageTitle', 'locations'));
    }

    public function locationStore(Request $request, $id = 0)
    {
        $request->validate([
            'name'  =>  'required|unique:locations|max:40|min:2'
        ]);

        if ($id) {
            $location       = Location::findOrFail($id);
            $notification   = 'Location updated successfully';
        } else {
            $location       = new Location();
            $notification   = 'Location added successfully';
        }

        $location->name     = $request->name;
        $location->save();
        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }
}
