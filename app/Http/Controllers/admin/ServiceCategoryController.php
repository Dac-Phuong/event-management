<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryService\Store;
use App\Http\Requests\Admin\CategoryService\Update;
use App\Services\ServiceCategories;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        return view('admin.service-category.index');
    }

    public function store(Store $request)
    {
        $data = $request->validated();
        $result = $this->categoryService()->create($data);
        return jsonResponse($result ? 0 : 1);
    }

    public function filterDataTable(Request $request)
    {
        $data = $request->all();
        $result = $this->categoryService()->filterDataTable($data);
        return response()->json($result);
    }

    public function categoryService()
    {
        return app(ServiceCategories::class);
    }
    public function update(Update $request)
    {
        $data = $request->validated();
        $id = $data['id'];
        $result = $this->categoryService()->update($id, $data);
        return jsonResponse($result ? 0 : 1);
    }
    public function destroy(Request $request)
    {
        if (!isset($request->id)) {
            return jsonResponse(0);
        }
        $id = $request->id;
        $result = $this->categoryService()->delete($id);
        return jsonResponse($result ? 0 : 1);
    }
}
