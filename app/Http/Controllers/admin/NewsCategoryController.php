<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsCategory\StoreNewsCategoryRequest;
use App\Http\Requests\Admin\NewsCategory\UpdateNewsCategoryRequest;
use App\Services\NewsCategoryService;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{

  public function index()
  {
    return view('admin.news-category.index');
  }

  public function store(StoreNewsCategoryRequest $request)
  {
    $data = $request->validated();
    $result = $this->newsCategoryService()->create($data);
    return jsonResponse($result ? 0 : 1);
  }

  public function filterDataTable(Request $request)
  {
    $data = $request->all();
    $result = $this->newsCategoryService()->filterDataTable($data);
    return response()->json($result);
  }

  public function newsCategoryService()
  {
    return app(NewsCategoryService::class);
  }
  public function update(UpdateNewsCategoryRequest $request)
  {
    $data = $request->validated();
    $id = $data['id'];
    $result = $this->newsCategoryService()->update($id, $data);
    return jsonResponse($result ? 0 : 1);
  }
  public function destroy(Request $request)
  {
    if (!isset($request->id)) {
      return jsonResponse(0);
    }
    $id = $request->id;
    $result = $this->newsCategoryService()->delete($id);
    return jsonResponse($result ? 0 : 1);
  }
}

