<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('Devices.add');
    }
    public function editdevice()
    {
        return view('Devices.edit');
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
    //end of Category Methods




}
