<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\UserCategoryService;

class IntroduceController extends Controller
{
    public function index(){
        $settings = $this->userCategoryService()->getConfig();
        $our_team = $this->userCategoryService()->getUserCategory();
        return view('client.introduce.index',compact('settings','our_team'));
    }
    public function userCategoryService()
    {
        return app(UserCategoryService::class);
    }
}
