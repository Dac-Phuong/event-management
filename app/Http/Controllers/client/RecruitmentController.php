<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Service;
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
        $services = Service::where('status', 1)->limit(5)->get();
        return view('client.recruitment.index', compact('recruitment', 'services'));
    }
    public function detail($slug)
    {
        $recruitment = $this->recruitment->getBySlug($slug);
        return view('client.recruitment.detail', compact('recruitment'));
    }
}
