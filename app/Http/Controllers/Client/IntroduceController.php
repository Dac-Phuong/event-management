<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Configs;
use App\Services\LocationService;
use App\Services\UserCategoryService;

class IntroduceController extends Controller
{
    public function index(){
        $settings = $this->userCategoryService()->getConfig();
        $location_news = $this->locationService()->getlocations();
        $our_team = $this->userCategoryService()->getUserCategory();
        $banner = json_decode(Configs::get_config('base_banner'), true);
        return view('client.introduce.index',compact('settings','our_team','location_news','banner'));
    }
    public function userCategoryService()
    {
        return app(UserCategoryService::class);
    }
    public function locationService()
    {
        return app(LocationService::class);
    }
}
