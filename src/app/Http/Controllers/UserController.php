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

    public function getDetail()
    {
        return view('user_detail');
    }

    public function getList(Request $request)
    {
         // 当月を取得
         $year = $request->input('year') ?? Carbon::today()->format('Y');
         $month = $request->input('month') ?? Carbon::today()->format('m');
         $thisMonth = Carbon::Create($year, $month, 01);
         // 前月を取得
         $previousMonth = $thisMonth->copy()->subMonth();
         // 翌月を取得
         $nextMonth = $thisMonth->copy()->addMonth();

         $user = Auth::user();
         $userAttendance = Stamp::whereMonth('created_at', $thisMonth)->where('user_id', $user->id)->get();

        return view('user_list', compact('thisMonth', 'previousMonth', 'nextMonth', 'user', 'userAttendance'));
    }

    public function getRequest()
    {
        return view('user_request');
    }
}

