<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $settingService;
    public function __construct()
    {
        $this->settingService = new SettingService();
    }
    public function index()
    {
        return view('admin.settings.index');
    }
    public function getSetting()
    {
        $result = $this->settingService->get_settings();
        return jsonResponse(0, $result);
    }

    public function updateSetting(Request $request)
    {   
        $result = $this->settingService->update_settings($request->all());
        return jsonResponse($result ? 0 : 1);
    }
}
