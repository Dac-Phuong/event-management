<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\SettingService;

class configController extends Controller
{
    public $settingService;
    public function __construct()
    {
        $this->settingService = new SettingService();
    }
    public function getConfig()
    {
        $result = $this->settingService->get_settings();
        return jsonResponse(0, $result);
    }
}
