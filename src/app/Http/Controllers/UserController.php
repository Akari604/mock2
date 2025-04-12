<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;
use Carbon\CarbonImmutable;
use App\Models\Stamp;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $now = CarbonImmutable::now();
        $now_format = $now->format('Y年m月d日(D)');
        $now_time = $now->format('H:i');
        $user_date = Stamp::whereDate('created_at', CarbonImmutable::today())->where('user_id', $user->id)->first();

        if (!$user_date) {
            $status = 0;
        } else {
            $status = $user_date->status;
        }   

        return view('index', compact('user', 'status', 'now_format', 'now_time'));
    }

    public function getDetail($id)
    {
        $user = User::find($id);

        return view('user_detail', compact('user'));
    }

    public function getList(Request $request)
    {
        // 当月を取得
        $year = $request->input('year') ?? Carbon::today()->format('Y');
        $month = $request->input('month') ?? Carbon::today()->format('m');
        $this_month = Carbon::Create($year, $month, 01);
        // 前月を取得
        $previous_month = $this_month->copy()->subMonth();
        // 翌月を取得
        $next_month = $this_month->copy()->addMonth();

        $user = Auth::user();
        $user_attendance = Stamp::whereMonth('created_at', $this_month)->where('user_id', $user->id)->get();

        $start_stamps = Stamp::select('start_work')->where('user_id', $user->id)->get();
        $end_stamps = Stamp::select('end_work')->where('user_id', $user->id)->get();
        
        // $hours = floor($diffInSeconds / 3600);
        // $minutes = floor(($diffInSeconds % 3600) / 60);

        return view('user_list', compact('this_month', 'previous_month', 'next_month', 'user', 'user_attendance', 'start_stamps', 'end_stamps'));
    }

    public function getRequest()
    {
        return view('user_request');
    }
}

