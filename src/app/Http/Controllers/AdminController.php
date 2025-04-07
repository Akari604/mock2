<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use App\Models\Stamp;
use App\Models\User;

class AdminController extends Controller
{
    public function getList(Request $request)
    {
         // 当月を取得
         $year = $request->input('year') ?? Carbon::today()->format('Y');
         $month = $request->input('month') ?? Carbon::today()->format('m');
         $thisMonth = Carbon::Create($year, $month, 01, 00, 00, 00);
         // 前月を取得
         $previousMonth = $thisMonth->copy()->subMonth();
         // 翌月を取得
         $nextMonth = $thisMonth->copy()->addMonth();

         $thisMonthData = Stamp::whereMonth('created_at', $thisMonth)->get();
         
        
        return view('admin_list', compact('thisMonth', 'previousMonth', 'nextMonth', 'thisMonthData'));
    }
    
    public function getAdminDetail($id)
    {
        $user = User::find($id);

        return view('admin_detail', compact('user'));
    }

    public function getStaff()
    {
        $users = User::all();

        return view('staff_list', compact('users'));
    }

    public function getStaffId($id)
    {
        $user = User::find($id);

        return view('staff_attendance', compact('user'));
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
