<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Services\NewsCategoryService;
use App\Services\NewsServices;
use App\Services\SeoService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index()
  {
    return view("admin.news.index");
  }
  public function create()
  {
    $catgegories = $this->categoryService()->getAllActive();
    return view("admin.news.create", compact("catgegories"));
  }
  public function newsService()
  {
    return app(NewsServices::class);
  }
  public function categoryService()
  {
    return app(NewsCategoryService::class);
  }
  public function filterDataTable(Request $request)
  {
    $data = $request->all();
    $result = $this->newsService()->filterDataTable($data);
    return response()->json($result);
  }

  public function store(StoreNewsRequest $request)
  {
    $data = $request->validated();
    $news = $this->newsService()->create($data);
    if ($news) {
      return jsonResponse(0);
    }
    return jsonResponse(1);
  }
  public function edit() {
    $id = request()->id;
    $news = $this->newsService()->findById($id);
    $catgegories = $this->categoryService()->getAllActive();
    return view("content.pages.news.edit", compact("news", "catgegories"));
  }
  public function update(UpdateNewsRequest $request)
  {
    $data = $request->validated();
    $news = $this->newsService()->update($data['id'], $data);
    if ($news) {
      return jsonResponse(0);
    }
    return jsonResponse(1);
  }
  public function destroy(Request $request)
  {
    $id = $request->id;
    $news = $this->newsService()->delete($id);
    if ($news) {
      return jsonResponse(0);
    }
    return jsonResponse(1);
  }
}
