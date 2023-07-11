<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\Student;
use App\Models\Device;
use Illuminate\Support\Facades\Redirect;

class AssetTrackerController extends Controller
{
    //Start of devices Methods
    public function alldevices()
    {
        return view('Devices.all');
    }

    public function managedevices()
    {
        return view('Devices.manage');
    }
    public function adddevice()
    {
        $categories = Category::all();
        return view('Devices.add', compact('categories'));
    }
    public function editdevice()
    {
        return view('Devices.edit');
    }

    public function postdevice(Request $request)
    {
        $device = Device::create([
            'modelnumber'=>$request->modelnumber,
            'studentid'=>$request->studentid,
            'type'=>$request->categoryid
        ]);

        return Redirect::route('devices');
    }
    //end of Devices Methods


    //Start of department Methods
    public function alldepartments()
    {
        return view('Department.all');
    }

    public function managedepartments()
    {
        return view('Department.manage');
    }
    public function adddepartment()
    {
        return view('Department.add');
    }
    public function editdepartment()
    {
        return view('Department.edit');
    }

    public function postdepartment(Request $request)
    {
        $department = Department::create([
            'name'=>$request->deptname
        ]);

        return Redirect::route('departments');
    }
    //end of Department Methods


    //Start of Students Methods
    public function allstudents()
    {
        return view('Student.all');
    }

    public function managestudents()
    {
        return view('Student.manage');
    }
    public function addstudent()
    {
        return view('Student.add');
    }
    public function editstudent()
    {
        return view('Student.edit');
    }

    public function poststudent(Request $request)
    {
        $student = Student::create([
            'name'=>$request->stdname,
            'departmentid'=>$request->deptid
        ]);
        return Redirect::route('students');
    }
    //end of Student Methods

    //Start of categories Methods    
    public function managecategories()
    {
        return view('Category.manage');
    }
    public function addcategory()
    {
        return view('Category.add');
    }
    public function editcategory()
    {
        return view('Category.edit');
    }

    public function postcategory(Request $request)
    {
        $category = Category::create([
            'name'=>$request->devicetype
        ]);
        return Redirect::route('managecategories');
    }
    //end of Category Methods




}
