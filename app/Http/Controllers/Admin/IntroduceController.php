<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class IntroduceController extends Controller
{
    public function index()
    {
        return view('admin.introduce.index');
    }
}
