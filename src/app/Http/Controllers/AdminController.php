<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
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
        $this_month = Carbon::Create($year, $month, 01, 00, 00, 00);
        // 前月を取得
        $previous_month = $this_month->copy()->subMonth();
        // 翌月を取得
        $next_month = $this_month->copy()->addMonth();

        $this_month_data = Stamp::whereMonth('created_at', $this_month)->get();        
        
        return view('admin_list', compact('this_month', 'previous_month', 'next_month', 'this_month_data'));
    }
    
    public function getAdminDetail($id)
    {
        $stamp = Stamp::find($id);

        return view('admin_detail', compact('stamp'));
    }

    public function getStaff()
    {
        $users = User::all();

        return view('staff_list', compact('users'));
    }

    public function getStaffId(Request $request, $id)
    {
        $users = User::find($id);

        // 当月を取得
        $year = $request->input('year') ?? Carbon::today()->format('Y');
        $month = $request->input('month') ?? Carbon::today()->format('m');
        $this_month = Carbon::Create($year, $month, 01);
        // 前月を取得
        $previous_month = $this_month->copy()->subMonth();
        // 翌月を取得
        $next_month = $this_month->copy()->addMonth();
 
        $user_attendance = Stamp::whereMonth('created_at', $this_month)->where('user_id', $id)->get();
 
        $start_stamps = Stamp::select('start_work')->where('user_id', $id)->get();
        $end_stamps = Stamp::select('end_work')->where('user_id', $id)->get();
 
        return view('staff_attendance', compact('users', 'this_month', 'previous_month', 'next_month', 'user_attendance', 'start_stamps', 'end_stamps'));
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
