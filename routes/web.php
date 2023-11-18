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
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'viewHome']);
Route::get('tin-tuc', [NewsController::class, 'viewTinTuc']);
Route::get('/get-products/{categoryId}', [HomeController::class, 'getProductbyCate']);


// Hưng
// Route::get('/san-pham', [ProductController::class, 'index']);
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/chitietsanpham/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/a', function(){
    return view('frontend.chitietsanpham');
});

use App\Http\Controllers\NewsController;
//Page Tin Tức
Route::get('/tin-tuc', [NewsController::class, 'viewTinTuc']);
Route::get('/tin-tuc/tin-tuc-{id}', [NewsController::class, 'viewDetailNews'])->name('news_detail');
//Admin quản lí tin tức
Route::get('/admin/quanlibaiviet/tintuc',[NewsController::class, 'viewAdminTinTuc'] );
Route::get('/admin/quanlibaiviet/add-tintuc',[NewsController::class, 'addNews'] )->name('add_news');
Route::get('/admin/quanlibaiviet/tintuc/tin-tuc-{id}',[NewsController::class, 'viewDetailNews'] )->name('admin_view_news');

//page giới thiệu

use App\Http\Controllers\IntroductPageController;
Route::get('/gioi-thieu', [IntroductPageController::class, 'viewIntroducePage']);