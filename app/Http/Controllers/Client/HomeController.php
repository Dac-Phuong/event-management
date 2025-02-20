<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\Home\Store;
use App\Models\Configs;
use App\Services\ContactService;

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
        $services = \App\Models\Service::where('status', 1)->limit(6)->get();
        $introduce = Configs::whereIn('key', ['introduce_image', 'introduce_content', 'introduce_youtube_id'])->pluck('value', 'key')->toArray();
        return view('client.home.index', compact('banner','services','introduce'));
    }
    public function sendContact(Store $request)
    {
        $data = $request->validated();
        $result = $this->contactService->sendContact($data);
        return jsonResponse($result ? 0 : 1);
    }
}
