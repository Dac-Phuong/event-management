<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
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
        Route::get('settings', [DashboardController::class, 'index'])->name('settings');

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
            Route::post('/delete', [NewsController::class, 'destroy'])->name('news.delete');
        });
    });
});