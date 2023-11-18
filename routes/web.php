<?php

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
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'viewHome']);
Route::get('/san-pham', [HomeController::class, 'searchProduct'])->name('search');
Route::get('/get-products/{categoryId}', [HomeController::class, 'getProductbyCate']);


use App\Http\Controllers\NewsController;
//Page Tin Tức
Route::get('/tin-tuc', [NewsController::class, 'viewTinTuc']);
Route::get('/tin-tuc/tin-tuc-{id}', [NewsController::class, 'viewDetailNews'])->name('news_detail');
//Admin quản lí tin tức
Route::get('/admin/quanlibaiviet/tintuc',[NewsController::class, 'viewAdminTinTuc'] )->name('news_search');
Route::get('/admin/quanlibaiviet/add-tintuc',[NewsController::class, 'addNews'] )->name('add_news');
Route::get('/admin/quanlibaiviet/tintuc/tin-tuc-{id}',[NewsController::class, 'viewDetailNews'] )->name('admin_view_news');

