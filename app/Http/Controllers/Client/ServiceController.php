<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\NewsCategoryService;
use App\Services\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->route('slug');
        $service = $this->service()->getBySlug($slug);
        $data['sidebar'] = $this->newsCategoryService()->getNewsSidebar();
        return view('client.service.index',compact('service','data'));
    }
    public function service()
    {
        return app(Services::class);
    }
    public function newsCategoryService()
    {
        return app(NewsCategoryService::class);
    }

}
