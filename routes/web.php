<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\IntroduceController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\admin\RecruitmentController;
use App\Http\Controllers\admin\ServiceCategoryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\UploadController;
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

// .......................................................................BEGIN............................................................................
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return "All caches are cleared";
});

Route::get('/', function () {
    return view('client.layouts.master');
});
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
        // Introduce
        Route::get('introduce', [IntroduceController::class, 'index'])->name('introduce');
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
        // Service Category
        Route::group(['prefix' => 'service-category'], function () {
            Route::get('/', [ServiceCategoryController::class, 'index'])->name('service-category.index');
            Route::post('/datatable', [ServiceCategoryController::class, 'filterDataTable'])->name('service-category.datatable');
            Route::post('/update', [ServiceCategoryController::class, 'update'])->name('service-category.update');
            Route::post('/store', [ServiceCategoryController::class, 'store'])->name('service-category.store');
            Route::post('/delete', [ServiceCategoryController::class, 'destroy'])->name('service-category.delete');
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