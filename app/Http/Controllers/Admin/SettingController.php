<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\Store;
use App\Http\Requests\Admin\Settings\Update;
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
    public function store(Store $request)
    {
        $result = $this->settingService->create($request->all());
        return jsonResponse($result ? 0 : 1);
    }
    public function update(Update $request)
    {
        if (!isset($request->id)) {
            return jsonResponse(0);
        }
        $id = $request->id;
        $result = $this->settingService->update($id, $request->all());
        return jsonResponse($result ? 0 : 1);
    }
    public function destroy(Request $request)
    {
        if (!isset($request->id)) {
            return jsonResponse(0);
        }
        $id = $request->id;
        $result = $this->settingService->delete($id);
        return jsonResponse($result ? 0 : 1);
    }

}
