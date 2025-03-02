<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\News;
use App\Services\NewsCategoryService;
use App\Services\NewsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
  public function index()
  {
    $catgegories = $this->categoryService()->getAllActive();
    return view("admin.news.index", compact("catgegories"));
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
  public function update(UpdateNewsRequest $request)
  {
    $data = $request->validated();
    $news = $this->newsService()->update($data['id'], $data);
    if ($news) {
      return jsonResponse(0);
    }
    return jsonResponse(1);
  }
  public function getContent(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|integer|exists:news,id',
    ]);
    if ($validator->fails())
      return jsonResponse(1);
    try {
      $id = $request->id;
      $content = News::findOrFail($id);
      return jsonResponse(0, $content->description);

    } catch (\Exception $e) {
      return jsonResponse(1);
    }

  }
  public function content(Request $request)
  {
    $id = $request->id;
    $content = $this->newsService()->content($id, $request->all());
    return jsonResponse($content ? 0 : 1);
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
  public function tags(Request $request)
  {
    $tags = $this->newsService()->getTags();
    return jsonResponse(0, $tags);
  }
}
