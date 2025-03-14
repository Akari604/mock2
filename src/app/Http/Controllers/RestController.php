<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\Status;
use App\Models\Rest;
use App\Models\Stamp;
use App\Http\Requests\StampRequest;

class RestController extends Controller
{
    public function takeBreak(Request $request)
    {
        // 休憩開始
        $stamps = Stamp::get('id')->first();
        $stamps->update([
            'status' => 3,
        ]);   

        $stamps = Rest::create([
            'start_rest' => Carbon::now(),
            'stamp_id' => $stamps->id,
        ]);
        
        return back();
    }

    public function doneBreak(Request $request)
    {
        // 休憩終了
        $stamps = Stamp::get('id')->first();
        $stamps->update([
            'status' => 2,
        ]);   

        $stamps = Rest::create([
            'end_rest' => Carbon::now(),
            'stamp_id' => $stamps->id,
        ]);      
    
        return back();
    }
}
