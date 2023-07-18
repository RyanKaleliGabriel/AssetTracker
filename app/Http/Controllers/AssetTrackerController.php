<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\Student;
use App\Models\Device;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


class AssetTrackerController extends Controller
{
    public function home()
    {
        $students = Student::count();
        $devices = Device::count();
        return view('welcome', compact('students', 'devices'));
    }
    //Start of devices Methods
    public function alldevices()
    {
        $devices = Device::all();
        return view('Devices.all', compact('devices'));
    }

    public function managedevices()
    {
        $devices = Device::all();
        $data= QrCode::generate('Welcome to Makitweb');
        return view('Devices.manage', compact('devices', 'data'));
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
        $validator = Validator::make($request->all(), [
            'modelnumber' => 'required|unique:devices',
            'studentid' => 'required',
            'categoryid' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $device = Device::create([
                'modelnumber'=>$request->modelnumber,
                'student_id'=>$request->studentid,
                'category_id'=>$request->categoryid,
            ]);

            QrCode::format('png')->generate('Welcome to Makitweb', public_path('qrcodes/qrcode.png') );
            $device->save();

            return Redirect::route('managedevices')->with('success', 'Device added successfully');
     
    }

    public function updatedevice(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'modelnumber' => 'required|unique:devices',
            'studentid' => 'required',
            'categoryid' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $device = Device::query()->where('id', $id)->update([
            'modelnumber'=>$request->modelnumber,
            'category_id'=>$request->categoryid,
            'student_id'=>$request->studentid
        ]);

        return Redirect::route('managedevices')->with('success', 'Device added successfully');;
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
        
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:departments',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $department = Department::create([
            'name' => $request->name,
        ]);
    
        return redirect()->route('managedepartments')->with('success', 'Department added successfully.');
    }

    public function updatedepartment(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:departments',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $department = Department::query()->where('id', $id)->update([
            'name'=>$request->name
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
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $student = Student::create([
            'name'=>$request->name,
            'department_id'=>$request->deptid
        ]);
        return Redirect::route('managestudents')->with('Success', 'Student Added succesfully');
    }
    public function updatestudent(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'deptid'=>'required'
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $student = Student::query()->where('id', $id)->update([
            'name'=>$request->name,
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
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::create([
            'name'=>$request->name
        ]);
        return Redirect::route('managecategories')->with('Success', 'Successfully added');
    }

    public function updatecategory(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::query()->where('id', $id)->update([
            'name'=>$request->name
        ]);
        return Redirect::route('managecategories');
    }

    public function deletecategory($id)
    {
        $category = Category::query()->where('id', $id)->delete();
        return Redirect::route('managecategories');
    }
    //end of Category Methods

    public function signup()
    {
        $departments = Department::all();
        return view('Administrator.signup', compact('departments'));
    }
    public function signin()
    {
        return view('Administrator.signin');
    }

    public function storeadmin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:administrators',
            'password'=>'required',
            'department_id'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $admin = Administrator::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'department_id'=>$request->department_id
        ]);
        return Redirect::route('signin')->with('success', 'Successfully added to database');
    }

    public function authadmin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return Redirect::route('home')->with('success', 'Successfully added to database');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors('Invalid credentials. Please try again.');
        }
    }

    public function signout()
    {
        Auth::logout();
        return Redirect::route('signin');
    }

}
