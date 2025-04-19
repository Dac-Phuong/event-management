<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\News\SearchRequest;
use App\Services\NewsCategoryService;
use App\Services\NewsServices;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function blog(){
        $data = $this->newsCategoryService()->getBlog();
        $data['sidebar'] = $this->newsCategoryService()->getNewsSidebar();
        return view('client.news.blog', compact('data'));
    }
    public function index(Request $request)
    {
        $slug = $request->route('slug');
        $data = $this->newsCategoryService()->getBySlug($slug);
        $data['sidebar'] = $this->newsCategoryService()->getNewsSidebar();
        return view('client.news.index', compact('data'));
    }
    public function detail($categorySlug, $newsSlug)
    {
        $data = $this->newsCategoryService()->getBySlugDetail($categorySlug, $newsSlug);
        $data['sidebar'] = $this->newsCategoryService()->getNewsSidebar();
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
        $data['sidebar'] = $this->newsCategoryService()->getNewsSidebar();
        $tag = $this->newsService()->getTag($slug);
        return view('client.news.tag', compact('data', 'tag'));
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
