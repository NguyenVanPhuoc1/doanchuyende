<?php

use App\Http\Controllers\FaviconController;
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
Route::get('/ket-qua-tim-kiem-san-pham', [HomeController::class, 'searchProduct'])->name('search');
Route::get('/get-products/{categoryId}', [HomeController::class, 'getProductbyCate']);


// Hưng
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoController;

// danh sách sản phẩm & chi tiết sản
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/chi-tiet-san-pham/{id}', [ProductController::class, 'show'])->name('products.show');
// them, xóa sửa sản phẩm
Route::resource('admin/san-pham', ProductController::class);
Route::get('admin/san-pham', [ProductController::class, 'indexAdmin'])->name('productsAdmin.show');
// quản lí logo
Route::get('admin/logo', [LogoController::class, 'index']);
Route::post('admin/update-logo', [LogoController::class, 'updateLogo']);
// quan li favicon
Route::get('admin/favicon', [FaviconController::class, 'index']);
Route::post('admin/update-favicon', [FaviconController::class, 'updateFavicon']);

use App\Http\Controllers\NewsController;
//Page Tin Tức
Route::get('/tin-tuc', [NewsController::class, 'viewTinTuc']);
Route::get('/tin-tuc/tin-tuc-{id}', [NewsController::class, 'viewDetailNews'])->name('news_detail');

//Admin quản lí tin tức
Route::get('/admin/quanlibaiviet/tintuc',[NewsController::class, 'viewAdminTinTuc'] )->name('news_search');
Route::get('/admin/quanlibaiviet/add-tintuc',[NewsController::class, 'viewPageaddNews'] )->name('view_add_news');
Route::post('/admin/quanlibaiviet/tintuc/add-tintuc', [NewsController::class, 'AddNews'])->name('add-news');
Route::get('/admin/quanlibaiviet/tintuc/tin-tuc-{id}',[NewsController::class, 'viewDetailNews'] )->name('admin_view_news');
Route::post('/admin/quanlibaiviet/tintuc', [NewsController::class, 'updateNews'])-> name('admin-updateNews');
Route::get('/admin/quanlibaiviet/tintuc/delete', [NewsController::class, 'deleteNews'])->name('deleteNews');//xóa theo checkbox
Route::get('/admin/quanlibaiviet/tintuc/delete/{id}', [NewsController::class, 'deleteNewsbyId'])->name('deleteNewsbyId');//xóa khi có id

//Chính sách
use App\Http\Controllers\PolicyController;
Route::get('/chinh-sach', [PolicyController::class, 'viewChinhSach']);

Route::get('/chinh-sach/chinh-sach-{id}', [PolicyController::class, 'viewDetailPolicy'])->name('policy_detail');
//page giới thiệu

use App\Http\Controllers\IntroductPageController;
Route::get('/gioi-thieu', [IntroductPageController::class, 'viewIntroducePage']);