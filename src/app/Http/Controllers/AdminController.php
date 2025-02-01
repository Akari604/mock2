<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getList()
    {
        return view('admin_list');
    }
    
    public function getAdminDetail()
    {
        return view('admin_detail');
    }

    public function getStaff()
    {
        return view('staff_attendance');
    }

    public function getStaffId()
    {
        return view('staff_list');
    }

    public function getAdminRequest()
    {
        return view('admin_request');
    }

    public function getApprove()
    {
        return view('approve');
    }
}
