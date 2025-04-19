<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Services\ProjectCategoryService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->route('slug');
        $data = $this->projectCategoryService()->getBySlug($slug);
        $data['categories'] = ProjectCategory::get();
        $feature = $this->projectCategoryService()->getBySlugWithFeature();
        $data['feature'] = $feature;
        return view('client.project.index', compact('data'));
    }
    public function detail($categorySlug, $newsSlug)
    {

        $data = $this->projectCategoryService()->getBySlugDetail($categorySlug, $newsSlug);
        $data['feature'] = $this->projectCategoryService()->getBySlugWithFeature();
        return view('client.project.detail', compact('data'));
    }
    public function category(Request $request)
    {
        $data = $this->projectCategoryService()->getCategory();
        return view('client.project.category', compact('data'));
    }
    public function projectCategoryService()
    {
        return app(ProjectCategoryService::class);
    }
 
}
