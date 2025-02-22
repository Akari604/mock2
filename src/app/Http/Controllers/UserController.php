<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;
use Carbon\CarbonImmutable;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $status = 2;
        CarbonImmutable::setLocale('ja');
        $now = CarbonImmutable::now();
        $now_format = $now->format('Y年m月d日(D)');
        $now->format('N') === '7';

        return view('index', compact('user', 'status', 'now_format', 'now'));
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

