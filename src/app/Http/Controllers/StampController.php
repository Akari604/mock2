<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\Status;
use App\Models\Stamp;
// use App\Http\Requests\StampRequest;

class StampController extends Controller
{
    public function clockIn()
    {
        // 勤務開始
        $user = Auth::user();
        $oldStamp = Stamp::where('user_id', $user->id)->latest()->first();
        if ($oldStamp) {
            $timestampClockIn = new Carbon($oldStamp->clockIn);
            $timestampDay = $timestampClockIn->startOfDay();
        } else {
            $timestamp = Stamp::create([
                'user_id' => $user->id,
                'stamp_date' => Carbon::now(),
                'start_work' => Carbon::now(),
                'status' => 2,
            ]);
        }
    
        return back();
    }

    public function clockOut(Request $request)
    {
        // 勤務終了
        $stamps = Stamp::get('id')->latest()->first();
        $stamps->update([
            'end_work' => Carbon::now(),
            'status' => 4,
        ]);

        return back();
    }
}
