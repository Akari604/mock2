<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;
use Carbon\CarbonImmutable;
use App\Models\Stamp;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $status = 2; 
        $now = CarbonImmutable::now();
        $now_format = $now->format('Y年m月d日(D)');
        $now_time = $now->format('H:i');
        $oldStamp = Stamp::where('user_id', $user->id)->latest()->first();

        if (!$oldStamp) {
            $status = 1; 
        } elseif ($status = 1) {
            $status = 2;
        } elseif ($status = 2) {
            $status = 4;
        } elseif (!$status = 2) {
            $status = 3;
        } 

        return view('index', compact('user', 'status', 'now_format', 'now_time'));
    }

    public function getDetail()
    {
        return view('user_detail');
    }

    public function getList()
    {
        return view('user_list');
    }

    public function getRequest()
    {
        return view('user_request');
    }
}

