<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\DownloadController;
use App\Http\Controllers\Backend\MyWorkController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\Forntend\FrontendBannerController;
use App\Http\Controllers\Forntend\FrontendDownloadController;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::name('forntend.')->group(function(){
Route::get('/',[FrontendBannerController::class,'index'])->name('home');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/banner',BannerController::class)->except(['show','index']);
Route::controller(BannerController::class)->group(function(){
Route::get('/banner/create','create')->name('banner.create');
Route::post('/banner/store','store')->name('banner.store');
Route::get('/banner/destroy/{id}','destroy')->name('banner.destroy');
Route::get('/banner/edit//{id}','edit')->name('banner.edit');
Route::post('/banner/update','update')->name('banner.update');
Route::get('/banner/status/{id}','status')->name('banner.status');
});
Route::resource('/download',DownloadController::class)->except(['show','index']);
Route::controller(DownloadController::class)->group(function(){
    Route::get('/download/create','create')->name('download.create');
    Route::post('/download/store','store')->name('download.store');
    Route::get('/download/destroy/{id}','destroy')->name('download.destroy');
    Route::get('/download/edit//{id}','edit')->name('download.edit');
    Route::post('/download/update','update')->name('download.update');
    Route::get('/download/status/{id}','status')->name('download.status');
});
Route::resource('/skill',SkillController::class)->except(['show','index' ,'update','edit']);
Route::controller(SkillController::class)->group(function(){
    Route::get('/skill/create','create')->name('skill.create');
    Route::post('/skill/store','store')->name('skill.store');
    Route::get('/skill/destroy/{id}','destroy')->name('skill.destroy');
    Route::get('/skill/status/{id}','status')->name('skill.status');
});
//service Route
Route::resource('/service',ServiceController::class)->except(['show','index']);
Route::controller(ServiceController::class)->group(function(){
    Route::get('/service/create','create')->name('service.create');
    Route::post('/service/store','store')->name('service.store');
    Route::get('/service/destroy/{id}','destroy')->name('service.destroy');
    Route::get('/service/edit//{id}','edit')->name('service.edit');
    Route::post('/service/update','update')->name('service.update');
    Route::get('/service/status/{id}','status')->name('service.status');
});
//Mywork Route
Route::resource('/mywork',MyWorkController::class)->except(['show','index']);
Route::controller(MyWorkController::class)->group(function(){
    Route::get('/mywork/create','create')->name('mywork.create');
    Route::post('/mywork/store','store')->name('mywork.store');
    Route::get('/service/destroy/{id}','destroy')->name('mywork.destroy');
    Route::get('/mywork/edit//{id}','edit')->name('mywork.edit');
    Route::post('/mywork/update','update')->name('mywork.update');
    Route::get('/mywork/status/{id}','status')->name('mywork.status');

});
