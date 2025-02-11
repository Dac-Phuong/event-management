<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
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
        return view('client.recruitment.index',compact('recruitment'));
    }
    public function detail($slug)
    {
        $recruitment = $this->recruitment->getBySlug($slug);
        return view('client.recruitment.detail',compact('recruitment'));
    }
}
