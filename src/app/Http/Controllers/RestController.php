<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\Status;
use App\Models\Rest;
use App\Models\Stamp;

class RestController extends Controller
{
    public function takeBreak($stampId)
    {
        // 打刻のIDを取得する
        // リクエストからかログインユーザーから取得
        // Stamp::find(打刻のID)

        // 休憩開始
        
        $stamp = Stamp::find($stampId);
        $stamp->update([
            'status' => 2,
        ]);   

        $stamps = Rest::create([
            'start_rest' => Carbon::now(),
            'stamp_id' => $stamp->id,
        ]);
        
        return back();
    }

    public function doneBreak($stampId)
    {
        // 休憩終了
        $stamp = Stamp::find($stampId);
        $stamp->update([
            'status' => 1,
        ]);   

        $stamps = Rest::create([
            'end_rest' => Carbon::now(),
            'stamp_id' => $stamp->id,
        ]);      
    
        return back();
    }
}
