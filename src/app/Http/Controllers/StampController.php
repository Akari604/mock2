<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\Status;

class StampController extends Controller
{
    public function clockIn()
    {
        // 勤務開始
        $user = Auth::user();
        $stamp = Stamp::all();
        $oldStamp = Stamp::where('user_id', $user->id)->latest('created_at')->first();
        if ($oldStamp) {
            $timestampClockIn = new Carbon($oldStamp->clockIn);
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

    public function clockOut($stampId)
    {
        // 勤務終了
        $stamp = Stamp::find($stampId);
        $stamp->update([
            'end_work' => Carbon::now(),
            'status' => 3,
        ]);

        return back();
    }
}
