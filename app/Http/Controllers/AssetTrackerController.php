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
use App\Charts\pie;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Charts\Bar;

class AssetTrackerController extends Controller
{
    public function home()
    {
        //Pie Chart
        $departments = Department::withCount('student')->where('active', true)->get();
        $piechart = new pie;
        $chartLabels = $departments->pluck('name')->toArray();
        $chartData = $departments->pluck('student_count')->toArray();
        $piechart->labels($chartLabels);
        $piechart->dataset(' Students', 'pie', $chartData);

        //Students Count
        $students = Student::where('active', true)->count();
        $devices = Device::where('active', true)->count();

        //Devices Count Bar Chart
        $categories = Category::withCount('device')->where('active', true)->get(); // Note the plural "devices" instead of "device"
        $barchart = new Bar(); // Make sure the class name is correct and follow proper capitalization (e.g., "BarChart" instead of "bar")
        $barlabels = $categories->pluck('name')->toArray();
        $barData = $categories->pluck('device_count')->toArray(); // Use "devices_count" instead of "device_count"
        $barchart->labels($barlabels);
        $barchart->dataset('Devices', 'bar', $barData);


        return view('welcome', compact('students', 'devices','piechart','barchart'));
    }
    //Start of devices Methods

    public function managedevices()
    {
        $devices = Device::where('active', true)->get();
        $data = QrCode::generate('Welcome to Makitweb');
        return view('Devices.manage', compact('devices', 'data'));
    }
    public function adddevice()
    {
        $categories = Category::where('active', true)->get();
        $students = Student::where('active', true)->get();
        return view('Devices.add', compact('categories', 'students'));
    }
    public function editdevice($id)
    {
        $categories = Category::where('active', true)->get();
        $students = Student::where('active', true)->get();
        $device = Device::query()->where('id', $id)->first();
        return view('Devices.edit', compact('device', 'students', 'categories'));
    }

    public function postdevice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'modelnumber' => 'required|unique:devices',
            'studentid' => 'required',
            'categoryid' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student = Student::find($request->studentid);
        if (!$student) {
            // Handle error if the student is not found
            return redirect()->back()->withErrors(['studentid' => 'Invalid student ID'])->withInput();
        }

        $device = Device::create([
            'modelnumber' => $request->modelnumber,
            'student_id' => $request->studentid,
            'category_id' => $request->categoryid,
           
        ]);
        $studentname = $student->name;
        $devicename = $request->modelnumber;
        $qrcodecontent = "Student Name: $studentname\n Device Model Number: $devicename\n Student ID: $request->studentid";
        $qrCodePath = 'qrcodes/' . $devicename . '.png';

        QrCode::format('png')->generate($qrcodecontent, public_path($qrCodePath));
        $device->qrcode_path = $qrCodePath;
        $device->save();

        return Redirect::route('managedevices')->with('success', 'Device added successfully');
    }

    public function updatedevice(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'modelnumber' => 'required|unique:devices,modelnumber,'. $id,
            'studentid' => 'required',
            'categoryid' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $device = Device::findorFail($id);

        if(!$device)
        {
            return redirect()->back()->withErrors(['device'=>'Device not found']);
        }

        $device->modelnumber = $request->modelnumber;
        $device->category_id = $request->categoryid;
        $device->student_id = $request->studentid;
        $device->save();

        $student = Student::find($request->studentid);
        if (!$student) {
            // Handle error if the student is not found
            return redirect()->back()->withErrors(['studentid' => 'Invalid student ID'])->withInput();
        }

        $studentname = $student->name;
        $devicename = $request->modelnumber;
        $qrcodecontent = "Student Name: $studentname\n Device Model Number: $devicename\n Student ID: $request->studentid";
        $qrCodePath = 'qrcodes/' . $devicename . '.png';

        QrCode::format('png')->generate($qrcodecontent, public_path($qrCodePath));
        $device->qrcode_path = $qrCodePath;
        $device->save();
        return Redirect::route('managedevices')->with('success', 'Device added successfully');;
    }

    public function deletedevice($id)
    {
        $device = Device::findorFail($id);
        if($device) 
        {
            $device->active=false;
            $device->save();
        }
        return redirect()->route('managedevices');
    }


    //end of Devices Methods


    //Start of department Methods
    public function managedepartments()
    {
        $departments = Department::where('active', true)->get();
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

        if ($validator->fails()) {
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
            'name' => 'required|unique:departments,name'. $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $department = Department::findorFail($id);
        $department ->update([
            'name' => $request->name
        ]);
        return Redirect::route('managedepartments');
    }

    public function deletedepartment($id)
    {
        $department = Department::find($id);
        if ($department) {
            $department->active = false;
            $department->save();
        }
        return Redirect::route('managedepartments');
    }
    //end of Department Methods


    //Start of Students Methods


    public function managestudents()
    {
        $students = Student::where('active', true)->get();
        return view('Student.manage', compact('students'));
    }
    public function addstudent()
    {
        $departments = Department::where('active', true)->get();
        return view('Student.add', compact('departments'));
    }
    public function editstudent($id)
    {
        $departments = Department::where('active', true)->get();
        $student = Student::query()->where('id', $id)->first();
        return view('Student.edit', compact('student', 'departments'));
    }

    public function poststudent(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $student = Student::create([
            'name' => $request->name,
            'department_id' => $request->deptid,
            
        ]);
        return Redirect::route('managestudents')->with('Success', 'Student Added succesfully');
    }
    public function updatestudent(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'deptid' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $student = Student::findorFail($id);
        $student ->update([
            'name' => $request->name,
            'department_id' => $request->deptid
        ]);
        return Redirect::route('managestudents');
    }

    public function deletestudent($id)
    {
        $student = Student::find($id);
        if($student)
        {
            $student->active = false;
            $student->save();
        }
        return Redirect::route('managestudents');
    }
    //end of Student Methods

    //Start of categories Methods    
    public function managecategories()
    {
        $categories = Category::where('active', true)->get();
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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::create([
            'name' => $request->name,
     
        ]);
        return Redirect::route('managecategories')->with('Success', 'Successfully added');
    }

    public function updatecategory(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::findorFail($id);
        $category->update([
            'name' => $request->name
        ]);
        return Redirect::route('managecategories');
    }

    public function deletecategory($id)
    {
        $category = Category::find($id);
        if($category)
        {
            $category->active=false;
            $category->save();
        }
        return Redirect::route('managecategories');
    }
    //end of Category Methods

    public function signup()
    {
        $departments = Department::where('active', true)->get();
        return view('Administrator.signup', compact('departments'));
    }
    public function signin()
    {
        return view('Administrator.signin');
    }

    public function storeadmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:administrators',
            'password' => 'required',
            'department_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $admin = Administrator::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'department_id' => $request->department_id
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

    public function download($id)
    {
        $device = Device::find($id);
        if (!$device) {
            abort(404);
        }
        $qrimagepath = public_path($device->qrcode_path);

        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qr_code.png"',
        ];
        return response()->download($qrimagepath, 'qr_code.png', $headers);
    }
}
