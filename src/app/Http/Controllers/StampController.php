<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use App\Http\Requests\StampRequest;

class StampController extends Controller
{
    public function clockIn(Request $request)
    {
        $stamp = Stamp::create([
            'user_id' => Auth::id(),
            'start_work' => Carbon::now(),
            'stamp_date' => Carbon::now(),
        ]);
    
        return back();
    }

    public function clockOut(Request $request)
    {
        $stamp = Stamp::create([
            'user_id' => Auth::id(),
            'end_work' => Carbon::now(),
            'stamp_date' => Carbon::now(),
            'total_rest' => Carbon::now(),
            'total_work' => Carbon::now(),
        ]);

        return back();
    }
}
