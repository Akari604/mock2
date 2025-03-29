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
        $now = CarbonImmutable::now();
        $now_format = $now->format('Y年m月d日(D)');
        $now_time = $now->format('H:i');
        $confirm_date = Stamp::where('user_id', $user->id)->latest('created_at')->first(); 
        $stamps = Stamp::all();

        if (!$confirm_date) {
            $status = 0;
        } else {
            $status = $confirm_date->status;
        }   

        return view('index', compact('user', 'status', 'now_format', 'now_time', 'stamps'));
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

