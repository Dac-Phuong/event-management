<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\News\SearchRequest;
use App\Models\Service;
use App\Services\NewsCategoryService;
use App\Services\NewsServices;
use App\Services\RecruitmentService;

class RecruitmentController extends Controller
{
    public $recruitment;
    public function __construct()
    {
        $this->recruitment = new RecruitmentService();
    }
    public function index()
    {
        $recruitment = $this->recruitment->getAllData();
        $feature = $this->newsService()->getFeature();
        $categories = $this->newsCategoryService()->getAll();
        return view('client.recruitment.index', compact('recruitment','categories', 'feature'));
    }
    public function detail($slug)
    {
        $feature = $this->newsService()->getFeature();
        $categories = $this->newsCategoryService()->getAll();
        $recruitment = $this->recruitment->getBySlug($slug);
        return view('client.recruitment.detail', compact('recruitment','feature','categories'));
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
