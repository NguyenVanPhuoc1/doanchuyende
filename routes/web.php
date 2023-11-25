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
Route::get('/ket-qua-tim-kiem-san-pham', [HomeController::class, 'searchProduct'])->name('search');
Route::get('/get-products/{categoryId}', [HomeController::class, 'getProductbyCate']);


// Hưng
use App\Http\Controllers\ProductController;
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/chitietsanpham/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/a', [ProductController::class, 'indexAdmin'])->name('productsAdmin.show');

use App\Http\Controllers\NewsController;
//Page Tin Tức
Route::get('/tin-tuc', [NewsController::class, 'viewTinTuc']);
Route::get('/tin-tuc/tin-tuc-{id}', [NewsController::class, 'viewDetailNews'])->name('news_detail');

//Admin quản lí tin tức
Route::get('/admin/quanlibaiviet/tintuc',[NewsController::class, 'viewAdminTinTuc'] )->name('news_search');
Route::get('/admin/quanlibaiviet/add-tintuc',[NewsController::class, 'viewPageaddNews'] )->name('view_add_news');
Route::post('/admin/quanlibaiviet/tintuc/add-tintuc', [NewsController::class, 'AddNews'])->name('add-news');
Route::get('/admin/quanlibaiviet/tintuc/tin-tuc-{id}',[NewsController::class, 'viewDetailNews'] )->name('admin_view_news');
Route::post('/admin/quanlibaiviet/tintuc/update-tintuc', [NewsController::class, 'updateNews'])-> name('admin-updateNews');
Route::get('/admin/quanlibaiviet/tintuc/delete', [NewsController::class, 'deleteNews'])->name('deleteNews');//xóa theo checkbox
Route::get('/admin/quanlibaiviet/tintuc/delete/{id}', [NewsController::class, 'deleteNewsbyId'])->name('deleteNewsbyId');//xóa khi có id
Route::get('/admin/quanlibaiviet/tintuc/tin-tuc-{id}/update-noibat', [NewsController::class, 'checkNoiBat'])->name('news.update-noibat');

//Chính sách
use App\Http\Controllers\PolicyController;
Route::get('/chinh-sach', [PolicyController::class, 'viewChinhSach']);
Route::get('/chinh-sach/chinh-sach-{id}', [PolicyController::class, 'viewDetailPolicy'])->name('policy_detail');

//Admin quản lí chính sách
Route::get('/admin/quanlichinhsach/chinhsach',[PolicyController::class, 'viewAdminChinhSach'] )->name('poli_search');
Route::get('/admin/quanlichinhsach/add-chinhsach',[PolicyController::class, 'viewPageaddPoli'] )->name('view_add_policys');
Route::post('/admin/quanlichinhsach/chinhsach/add-chinhsach', [PolicyController::class, 'AddPolicys'])->name('add-policy');
Route::get('/admin/quanlichinhsach/chinhsach/chinh-sach-{id}',[PolicyController::class, 'viewDetailPolicy'] )->name('admin_view_poli');
Route::post('/admin/quanlichinhsach/chinhsach', [PolicyController::class, 'updatePolicys'])-> name('admin-updatePolicys');
Route::get('/admin/quanlichinhsacht/chinhsach/delete', [PolicyController::class, 'deletePolicys'])->name('deletePolicys');//xóa theo checkbox
Route::get('/admin/quanlichinhsach/chinhsach/delete/{id}', [PolicyController::class, 'deletePolicybyId'])->name('deletePolibyId');//xóa khi có id


//page giới thiệu

use App\Http\Controllers\IntroductPageController;
Route::get('/gioi-thieu', [IntroductPageController::class, 'viewIntroducePage']);

use App\Http\Controllers\SendMailController;
// Page trang chủ
Route::post('/', [SendMailController::class, 'AddCustomer'])->name('add-customer');
//page quan lí nhận tin admin
Route::get('/admin/quanlinhantin', [SendMailController::class, 'viewPageQliNhanTin']);
Route::get('/admin/quanlibaiviet/customer/delete', [SendMailController::class, 'totalCustomer'])->name('delete_send_Customer');
Route::get('/admin/quanlinhantin/customer/delete/{id}', [SendMailController::class, 'deleteCustomerbyId'])->name('deleteCusbyId');