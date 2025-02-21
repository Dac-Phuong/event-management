<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Service\Store;
use App\Http\Requests\Admin\Service\Update;
use App\Services\Services;
class ServiceController extends Controller
{
    public function index()
    {
        return view("admin.service.index");
    }
    public function service()
    {
        return app(Services::class);
    }
    public function filterDataTable(Request $request)
    {
        $data = $request->all();
        $result = $this->service()->filterDataTable($data);
        return response()->json($result);
    }

    public function store(Store $request)
    {
        $data = $request->validated();
        $service = $this->service()->create($data);
        if ($service) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function update(Update $request)
    {
        $data = $request->validated();
        $service = $this->service()->update($data['id'], $data);
        if ($service) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function createImage(Request $request)
    {
        $data = $request->all();
        $service = $this->service()->createImage($data['id'], $data);
        if ($service) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function content(Request $request)
    {
        $id = $request->id;
        $content = $this->service()->content($id, $request->all());
        return jsonResponse($content ? 0 : 1);
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $service = $this->service()->delete($id);
        if ($service) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function deleteImage(Request $request)
    {
        $id = $request->id;
        $service = $this->service()->deleteImage($id);
        if ($service) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
}
