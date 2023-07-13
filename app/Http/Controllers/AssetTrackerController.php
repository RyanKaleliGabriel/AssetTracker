<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\Student;
use App\Models\Device;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AssetTrackerController extends Controller
{
    //Start of devices Methods
    public function alldevices()
    {
        $devices = Device::all();
        return view('Devices.all', compact('devices'));
    }

    public function managedevices()
    {
        $devices = Device::all();
        return view('Devices.manage', compact('devices'));
    }
    public function adddevice()
    {
        $categories = Category::all();
        $students = Student::all();
        return view('Devices.add', compact('categories', 'students'));
    }
    public function editdevice($id)
    {
        $categories = Category::all();
        $students = Student::all();
        $device = Device::query()->where('id', $id)->first();
        return view('Devices.edit', compact('device','students','categories'));
    }

    public function postdevice(Request $request)
    {
        $device = Device::create([
            'modelnumber'=>$request->modelnumber,
            'student_id'=>$request->studentid,
            'category_id'=>$request->categoryid
        ]);

        return Redirect::route('managedevices');
    }

    public function updatedevice(Request $request, $id)
    {
        $device = Device::query()->where('id', $id)->update([
            'modelnumber'=>$request->modelnumber,
            'category_id'=>$request->categoryid,
            'student_id'=>$request->studentid
        ]);

        return Redirect::route('managedevices');
    }

    public function deletedevice($id)
    {

        $devicetobedeleted = Device::query()->where('id', $id)->first();
        $device = Device::query()->where('id', $id)->delete();
        return redirect()->route('managedevices');
 

    }


    //end of Devices Methods


    //Start of department Methods
    public function alldepartments()
    {
        $departments = Department::all();
        return view('Department.all', compact('departments'));
    }

    public function managedepartments()
    {
        $departments = Department::all();
        return view('Department.manage', compact('departments'));
    }
    public function adddepartment()
    {
        return view('Department.add');
    }
    public function editdepartment($id)
    {
        $department = Department::query()->where('id', $id)->first();
        return view('Department.edit', compact('department'));
    }

    public function postdepartment(Request $request)
    {
        $department = Department::create([
            'name'=>$request->deptname
        ]);

        return Redirect::route('managedepartments');
    }

    public function updatedepartment(Request $request, $id)
    {
        $department = Department::query()->where('id', $id)->update([
            'name'=>$request->deptname
        ]);
        return Redirect::route('managedepartments');
    }

    public function deletedepartment($id)
    {
        $department = Department::query()->where('id', $id)->delete();
        return Redirect::route('managedepartments');
    }
    //end of Department Methods


    //Start of Students Methods
    public function allstudents()
    {
        $students = Student::all();
        return view('Student.all', compact('students'));
    }

    public function managestudents()
    {
        $students = Student::all();
        return view('Student.manage', compact('students'));
    }
    public function addstudent()
    {
        $departments = Department::all();
        return view('Student.add', compact('departments'));
    }
    public function editstudent($id)
    {
        $departments = Department::all();
        $student = Student::query()->where('id', $id)->first();
        return view('Student.edit', compact('student', 'departments'));
    }

    public function poststudent(Request $request)
    {
        $student = Student::create([
            'name'=>$request->stdname,
            'department_id'=>$request->deptid
        ]);
        return Redirect::route('managestudents');
    }
    public function updatestudent(Request $request, $id)
    {
        $student = Student::query()->where('id', $id)->update([
            'name'=>$request->stdname,
            'department_id'=>$request->deptid
        ]);
        return Redirect::route('managestudents');
    }

    public function deletestudent($id)
    {
        $student = Student::query()->where('id', $id)->delete();
        return Redirect::route('managestudents');
    }
    //end of Student Methods

    //Start of categories Methods    
    public function managecategories()
    {
        $categories = Category::all();
        return view('Category.manage', compact('categories'));
    }
    public function addcategory()
    {
        return view('Category.add');
    }
    public function editcategory($id)
    {
        $category = Category::query()->where('id', $id)->first();
        return view('Category.edit', compact('category'));
    }

    public function postcategory(Request $request)
    {
        $category = Category::create([
            'name'=>$request->devicetype
        ]);
        return Redirect::route('managecategories');
    }

    public function updatecategory(Request $request, $id)
    {
        $category = Category::query()->where('id', $id)->update([
            'name'=>$request->devicetype
        ]);
        return Redirect::route('managecategories');
    }

    public function deletecategory($id)
    {
        $category = Category::query()->where('id', $id)->delete();
        return Redirect::route('managecategories');
    }
    //end of Category Methods




}
