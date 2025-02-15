<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\Home\Store;
use App\Models\Configs;
use App\Services\ContactService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $contactService;
    public function __construct()
    {
        $this->contactService = new ContactService();
    }
    public function index()
    {
        $banner = json_decode(Configs::get_config('base_banner'), true);
        return view('client.home.index', compact('banner'));
    }
    public function sendContact(Store $request)
    {
        $data = $request->validated();
        $result = $this->contactService->sendContact($data);
        return jsonResponse($result ? 0 : 1);
    }
}
