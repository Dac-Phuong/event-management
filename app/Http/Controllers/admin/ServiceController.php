<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Service\Store;
use App\Http\Requests\Admin\Service\Update;
use App\Models\News;
use App\Models\Service;
use App\Services\Services;
use App\Services\ServiceCategories;
use Illuminate\Support\Facades\Validator;
class ServiceController extends Controller
{
    public function index()
    {
        $catgegories = $this->categoryService()->getAllActive();
        return view("admin.service.index", compact("catgegories"));
    }
        public function service()
    {
        return app(Services::class);
    }
    public function categoryService()
    {
        return app(ServiceCategories::class);
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
        $news = $this->service()->create($data);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function update(Update $request)
    {
        $data = $request->validated();
        $news = $this->service()->update($data['id'], $data);
        if ($news) {
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
        $news = $this->service()->delete($id);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
}
