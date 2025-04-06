<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\Status;
use Carbon\CarbonImmutable;

class StampController extends Controller
{
    public function clockIn()
    {
        // 勤務開始
        $user = Auth::user();
        $user_date = Stamp::whereDate('created_at', CarbonImmutable::today())->where('user_id', $user->id)->first();
        if ($user_date) {
            $timestampClockIn = new Carbon($user_date->clockIn);
            $timestampDay = $timestampClockIn->startOfDay();
        } else {
            $timestamp = Stamp::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'stamp_date' => Carbon::now(),
                'start_work' => Carbon::now(),
                'status' => 1,
            ]);
        }
    
        return back();
    }

    public function clockOut()
    {
        // 勤務終了
        $user = Auth::user();
        $user_date = Stamp::whereDate('created_at', CarbonImmutable::today())->where('user_id', $user->id);
        $user_date->update([
            'end_work' => Carbon::now(),
            'status' => 3,
        ]);

        return back();
    }
}
