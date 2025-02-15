<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\ProjectCategoryService;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->route('slug');
        $data = $this->projectCategoryService()->getBySlug($slug);
        $feature = $this->projectCategoryService()->getBySlugWithFeature($slug);
        $data['feature'] = $feature;
        return view('client.project.index', compact('data'));
    }
    public function detail($categorySlug, $newsSlug)
    {

        $data = $this->projectCategoryService()->getBySlugDetail($categorySlug, $newsSlug);
        $feature = $this->projectCategoryService()->getBySlugWithFeature($categorySlug);
        $data['feature'] = $feature;
        return view('client.project.detail', compact('data'));
    }
    public function projectCategoryService()
    {
        return app(ProjectCategoryService::class);
    }
}
