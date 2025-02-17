<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\IntroduceController;
use App\Http\Controllers\admin\NewsCategoryController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ProjectCategoryController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\RecruitmentController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\client\configController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\IntroduceController as ClientIntroduceController;
use App\Http\Controllers\client\NewsController as ClientNewsController;
use App\Http\Controllers\client\ProjectController as ClientProjectController;
use App\Http\Controllers\client\RecruitmentController as ClientRecruitmentController;
use App\Http\Controllers\client\ServiceController as ClientServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::fallback(function () {
    return view('errors.404');
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return "All caches are cleared";
});
// .......................................................................CLIENT............................................................................
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/introduce', [ClientIntroduceController::class, 'index'])->name('introduce');
Route::get('/get-config', [configController::class, 'getConfig'])->name('configs');
Route::get('/service/{slug}', [ClientServiceController::class, 'index'])->name('service');
Route::get('/news/{slug}', [ClientNewsController::class, 'index'])->name('news');
Route::get('/news/{categorySlug}/{newsSlug}', [ClientNewsController::class, 'detail'])->name('news.detail');
Route::post('/news/search', [ClientNewsController::class, 'searchNews'])->name('news.search');

Route::get('/recruitment', [ClientRecruitmentController::class, 'index'])->name('recruitment');
Route::get('/recruitment/{slug}', [ClientRecruitmentController::class, 'detail'])->name('recruitment.detail');
Route::get('/project/{slug}', [ClientProjectController::class, 'index'])->name('project');
Route::get('/project/{categorySlug}/{newsSlug}', [ClientProjectController::class, 'detail'])->name('project.detail');
Route::post('/contact/send', [HomeController::class, 'sendContact'])->name('send.contact');


// ........................................................................SERVER............................................................................
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::post('login', [AuthController::class, 'post_login'])->name('post_login');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('', [DashboardController::class, 'index'])->name('statistical');
        // Setting
        Route::get('settings', [SettingController::class, 'index'])->name('settings');
        Route::get('/get', [SettingController::class, 'getSetting'])->name('setting.get_setting');
        Route::post('/update', [SettingController::class, 'updateSetting'])->name('setting.update_setting');
        Route::post('settings/banner/store', [SettingController::class, 'store'])->name('settings.banner.store');
        Route::post('settings/banner/delete', [SettingController::class, 'destroy'])->name('settings.banner.delete');
        Route::post('settings/banner/update', [SettingController::class, 'update'])->name('settings.banner.update');
        // Setting introduce
        Route::post('settings/introduce/update', [SettingController::class, 'update'])->name('settings.banner.update');

        // User
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('users');
            Route::post('/create', [UserController::class, 'store'])->name('user.create');
            Route::post('/update', [UserController::class, 'update'])->name('user.update');
            Route::post('/delete', [UserController::class, 'destroy'])->name('user.delete');
            Route::post('/datatable', [userController::class, 'filterDataTable'])->name('user.datatable');
        });

        // Introduce
        Route::get('introduce', [IntroduceController::class, 'index'])->name('introduce');
        // Contact
        Route::get('contact', [ContactController::class, 'index'])->name('contact');
        Route::post('contact/datatable', [ContactController::class, 'filterDataTable'])->name('contact.datatable');
        //Upload
        Route::post('upload', [UploadController::class, 'upload'])->name('upload.image');
        // news category
        Route::group(['prefix' => 'news-category'], function () {
            Route::get('/', [NewsCategoryController::class, 'index'])->name('news-category.index');
            Route::post('/datatable', [NewsCategoryController::class, 'filterDataTable'])->name('news-category.datatable');
            Route::post('/update', [NewsCategoryController::class, 'update'])->name('news-category.update');
            Route::post('/store', [NewsCategoryController::class, 'store'])->name('news-category.store');
            Route::post('/delete', [NewsCategoryController::class, 'destroy'])->name('news-category.delete');
        });
        // news
        Route::group(['prefix' => 'news'], function () {
            Route::get('/', [NewsController::class, 'index'])->name('news.index');
            Route::get('/create', [NewsController::class, 'create'])->name('news.create');
            Route::post('/store', [NewsController::class, 'store'])->name('news.store');
            Route::post('/datatable', [NewsController::class, 'filterDataTable'])->name('news.datatable');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
            Route::post('/update', [NewsController::class, 'update'])->name('news.update');
            Route::post('/get/content', [NewsController::class, 'getContent'])->name('news.get.content');
            Route::post('/update/content', [NewsController::class, 'content'])->name('news.update.content');
            Route::post('/delete', [NewsController::class, 'destroy'])->name('news.delete');
        });
        // Service
        Route::group(['prefix' => 'service'], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('service.index');
            Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
            Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
            Route::post('/datatable', [ServiceController::class, 'filterDataTable'])->name('service.datatable');
            Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
            Route::post('/update', [ServiceController::class, 'update'])->name('service.update');
            Route::post('/delete', [ServiceController::class, 'destroy'])->name('service.delete');
        });
        // Project Category
        Route::group(['prefix' => 'project-category'], function () {
            Route::get('/', [ProjectCategoryController::class, 'index'])->name('project-category.index');
            Route::post('/datatable', [ProjectCategoryController::class, 'filterDataTable'])->name('project-category.datatable');
            Route::post('/update', [ProjectCategoryController::class, 'update'])->name('project-category.update');
            Route::post('/store', [ProjectCategoryController::class, 'store'])->name('project-category.store');
            Route::post('/delete', [ProjectCategoryController::class, 'destroy'])->name('project-category.delete');
        });
        // Project
        Route::group(['prefix' => 'project'], function () {
            Route::get('/', [ProjectController::class, 'index'])->name('project.index');
            Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
            Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
            Route::post('/datatable', [ProjectController::class, 'filterDataTable'])->name('project.datatable');
            Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
            Route::post('/update', [ProjectController::class, 'update'])->name('project.update');
            Route::post('/get/content', [ProjectController::class, 'getContent'])->name('project.get.content');
            Route::post('/update/content', [ProjectController::class, 'content'])->name('project.update.content');
            Route::post('/delete', [ProjectController::class, 'destroy'])->name('project.delete');
        });
        // Recruitment
        Route::group(['prefix' => 'recruitment'], function () {
            Route::get('/', [RecruitmentController::class, 'index'])->name('recruitment.index');
            Route::get('/create', [RecruitmentController::class, 'create'])->name('recruitment.create');
            Route::post('/store', [RecruitmentController::class, 'store'])->name('recruitment.store');
            Route::post('/datatable', [RecruitmentController::class, 'filterDataTable'])->name('recruitment.datatable');
            Route::get('/edit/{id}', [RecruitmentController::class, 'edit'])->name('recruitment.edit');
            Route::post('/update', [RecruitmentController::class, 'update'])->name('recruitment.update');
            Route::post('/get/content', [RecruitmentController::class, 'getContent'])->name('recruitment.get.content');
            Route::post('/update/content', [RecruitmentController::class, 'content'])->name('recruitment.update.content');
            Route::post('/delete', [RecruitmentController::class, 'destroy'])->name('recruitment.delete');
        });
    });
});