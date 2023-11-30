<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
use App\Http\Controllers\ChartController;

Route::get('/admin/trang-chu', [ChartController::class, 'viewChart']);
// Route::get('/admin/trang-chu', [ChartController::class, 'getAnalyticsData']);

use App\Http\Controllers\HomeController;

//Login Admin
use App\Http\Controllers\CustomAuthController;

Route::get('/login', [CustomAuthController::class, 'Login'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//Home
Route::get('/', [HomeController::class, 'viewHome']);
Route::get('/ket-qua-tim-kiem-san-pham', [HomeController::class, 'searchProduct'])->name('search');
Route::get('/get-products/{categoryId}', [HomeController::class, 'getProductbyCate']);

// Hưng
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\CommentController;
// danh sách sản phẩm & chi tiết sản phẩm
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/chi-tiet-san-pham/{id}', [ProductController::class, 'show'])->name('products.show');
// them binh luan
Route::post('/product/{productId}/comments', [CommentController::class, 'store'])->name('product.comments.store');

use App\Http\Controllers\NewsController;
//Page Tin Tức
Route::get('/tin-tuc', [NewsController::class, 'viewTinTuc']);
Route::get('/tin-tuc/tin-tuc-{id}', [NewsController::class, 'viewDetailNews'])->name('news_detail');

use App\Http\Controllers\PolicyController;

Route::middleware(['auth', 'admin.access'])->group(function () {
    // Các route của trang admin
    Route::get('/admin', [CustomAuthController::class, 'Dashboard'])->name('admin');
    // ...
    //Admin quản lí tin tức
    Route::get('/admin/quanlibaiviet/tintuc', [NewsController::class, 'viewAdminTinTuc'])->name('news_search');
    Route::get('/admin/quanlibaiviet/add-tintuc', [NewsController::class, 'viewPageaddNews'])->name('view_add_news');
    Route::post('/admin/quanlibaiviet/tintuc/add-tintuc', [NewsController::class, 'AddNews'])->name('add-news');
    Route::get('/admin/quanlibaiviet/tintuc/tin-tuc-{id}', [NewsController::class, 'viewDetailNews'])->name('admin_view_news');
    Route::post('/admin/quanlibaiviet/tintuc', [NewsController::class, 'updateNews'])->name('admin-updateNews');
    Route::get('/admin/quanlibaiviet/tintuc/delete', [NewsController::class, 'deleteNews'])->name('deleteNews'); //xóa theo checkbox
    Route::get('/admin/quanlibaiviet/tintuc/delete/{id}', [NewsController::class, 'deleteNewsbyId'])->name('deleteNewsbyId'); //xóa khi có id
    Route::get('/admin/quanlibaiviet/tintuc/tin-tuc-{id}/update-noibat', [NewsController::class, 'checkNoiBat'])->name('checkNoiBat'); //xóa khi có id

    //Admin quản lí chính sách
    Route::get('/admin/quanlichinhsach/chinhsach', [PolicyController::class, 'viewAdminChinhSach'])->name('poli_search');
    Route::get('/admin/quanlichinhsach/add-chinhsach', [PolicyController::class, 'viewPageaddPoli'])->name('view_add_policys');
    Route::post('/admin/quanlichinhsach/chinhsach/add-chinhsach', [PolicyController::class, 'AddPolicys'])->name('add-policy');
    Route::get('/admin/quanlichinhsach/chinhsach/chinh-sach-{id}', [PolicyController::class, 'viewDetailPolicy'])->name('admin_view_poli');
    Route::post('/admin/quanlichinhsach/chinhsach', [PolicyController::class, 'updatePolicys'])->name('admin-updatePolicys');
    Route::get('/admin/quanlichinhsacht/chinhsach/delete', [PolicyController::class, 'deletePolicys'])->name('deletePolicys'); //xóa theo checkbox
    Route::get('/admin/quanlichinhsach/chinhsach/delete/{id}', [PolicyController::class, 'deletePolicybyId'])->name('deletePolibyId'); //xóa khi có id


    // them, xóa sửa sản phẩm
    Route::resource('admin/san-pham', ProductController::class);
    Route::get('admin/san-pham', [ProductController::class, 'indexAdmin'])->name('productsAdmin.show');
    // quản lí logo
    Route::get('admin/logo', [LogoController::class, 'index']);
    Route::post('admin/update-logo', [LogoController::class, 'updateLogo']);
    // quan li favicon
    Route::get('admin/favicon', [FaviconController::class, 'index']);
    Route::post('admin/update-favicon', [FaviconController::class, 'updateFavicon']);
});



//Chính sách
Route::get('/chinh-sach', [PolicyController::class, 'viewChinhSach']);
Route::get('/chinh-sach/chinh-sach-{id}', [PolicyController::class, 'viewDetailPolicy'])->name('policy_detail');

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

// page lien he
Route::get('/lien-he', [IntroductPageController::class, 'viewContact']);
Route::post('/lien-he', [SendMailController::class, 'AddCustomer'])->name('regis-customer');

// Admin danh muc
use App\Http\Controllers\CategoryController;

Route::get('/admin/quanlidanhmuc', [CategoryController::class, 'viewCategory']);
Route::get('/admin/quanlidanhmuc/add-cate', [CategoryController::class, 'viewPageaddCate'])->name('view_add_cate');
Route::post('/admin/quanlidanhmuc/add-cate', [CategoryController::class, 'AddCate'])->name('add-cate');
Route::get('/admin/quanlidanhmuc/danh-muc-{id}', [CategoryController::class, 'viewDetailCate'])->name('admin_view_cate');
Route::post('/admin/quanlidanhmuc', [CategoryController::class, 'updateCate'])->name('admin-updateCate');
Route::get('/admin/quanlidanhmuc/delete', [CategoryController::class, 'deleteCate'])->name('deleteCate'); //xóa theo checkbox
Route::get('/admin/quanlidanhmuc/delete/{id}', [CategoryController::class, 'deleteCatebyId'])->name('deleteCatebyId'); //xóa khi có id
Route::get('/admin/quanlidanhmuc/danh-muc-{id}/update-noibat', [CategoryController::class, 'checkNoiBat'])->name('checkNoiBat');//xóa khi có id