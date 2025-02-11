<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

class IntroduceController extends Controller
{
    public function index(){
        return view('client.introduce.index');
    }
}
