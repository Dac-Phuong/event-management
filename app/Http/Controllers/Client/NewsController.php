<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\News\SearchRequest;
use App\Services\NewsCategoryService;
use App\Services\NewsServices;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->route('slug');
        $data = $this->newsCategoryService()->getBySlug($slug);
        $feature = $this->newsCategoryService()->getNewsFeature();
        $data['categories'] = $this->newsCategoryService()->getAll();
        $data['feature'] = $feature;
        return view('client.news.index', compact('data'));
    }
    public function detail($categorySlug, $newsSlug)
    {
        $data = $this->newsCategoryService()->getBySlugDetail($categorySlug, $newsSlug);
        $feature = $this->newsCategoryService()->getNewsFeature();
        $data['categories'] = $this->newsCategoryService()->getAll();
        $data['feature'] = $feature;
        return view('client.news.detail', compact('data'));
    }
    public function searchNews(SearchRequest $request)
    {
        $data = $request->validated();
        $result = $this->newsService()->searchNews($data);
        return jsonResponse(0, $result);
    }
    public function tag(Request $request)
    {
        $slug = $request->route('slug');
        $data = $this->newsService()->getNewsByTag($slug);
        $categories = $this->newsCategoryService()->getAll();
        $feature = $this->newsCategoryService()->getNewsFeature();
        $tag = $this->newsService()->getTag($slug);
        return view('client.news.tag', compact('data', 'categories', 'feature','tag'));
    }
    public function newsService()
    {
        return app(NewsServices::class);
    }
    public function newsCategoryService()
    {
        return app(NewsCategoryService::class);
    }
}
