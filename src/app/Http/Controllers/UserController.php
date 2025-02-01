<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
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

