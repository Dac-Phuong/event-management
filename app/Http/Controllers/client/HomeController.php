<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Configs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banner = json_decode(Configs::get_config('base_banner'), true);
        return view('client.home.index', compact('banner'));
    }
}
