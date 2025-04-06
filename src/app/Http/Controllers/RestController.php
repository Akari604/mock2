<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\Status;
use App\Models\Rest;
use App\Models\Stamp;
use App\Models\User;
use Carbon\CarbonImmutable;

class RestController extends Controller
{
    public function takeBreak()
    {
        // 休憩開始
        $user = Auth::user();
        $user_date = Stamp::whereDate('created_at', CarbonImmutable::today())->where('user_id', $user->id);
        $user_date->update([
            'status' => 2,
        ]);  

        $stamp = Auth::user()->stamps()->first();
        $stamp_id = Stamp::find($stamp->id);
        $stamps = Rest::create([
            'start_rest' => Carbon::now(),
            'stamp_id' =>  $stamp_id->id,
        ]);
        
        return back();
    }

    public function doneBreak()
    {
        // 休憩終了
        $user = Auth::user();
        $user_date = Stamp::whereDate('created_at', CarbonImmutable::today())->where('user_id', $user->id);
        $user_date->update([
            'status' => 1,
        ]);  

        $stamp = Auth::user()->stamps()->first();
        $rest_date = Rest::whereDate('created_at', CarbonImmutable::today())->where('stamp_id', $stamp->id);
        $rest_date->update([
            'end_rest' => Carbon::now(),
        ]);    
    
        return back();
    }
}
