<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('post/{slug}', [HomeController::class, 'show_post'])->name('posts');
Route::get('/category/{slug}', [HomeController::class, 'show_category'])->name('category');
Route::post('subscription', [SubscriptionController::class, 'store'])->name('subscription');
Route::get('/tag/{slug}',[HomeController::class,'show_tag'])->name('tag');


Auth::routes([
    'register' => false,
    'verify' => false,
]);


/**   Admin Route */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/post', PostController::class);
    Route::get('/subscription',[SubscriptionController::class,'index'])->name('admin.subscription');
    Route::get('/setting',[SettingController::class,'index'])->name('admin.setting');
    Route::post('/setting/site_update',[SettingController::class,'site_update'])->name('admin.setting.site_update');
    Route::post('/setting/footer_update',[SettingController::class,'footer_update'])->name('admin.setting.footer_update');
    Route::post('/setting/sidebar_update',[SettingController::class,'sidebar_update'])->name('admin.setting.sidebar_update');
    Route::post('/setting/user_update',[SettingController::class,'user_update'])->name('admin.setting.user_update');
});