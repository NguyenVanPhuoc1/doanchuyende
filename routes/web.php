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
Route::get('/chinh-sach', [NewsController::class, 'viewChinhSach']);
Route::get('/tin-tuc/tin-tuc-{id}', [NewsController::class, 'viewDetailNews'])->name('news_detail');
Route::get('/chinh-sach/chinh-sach-{id}', [NewsController::class, 'viewDetailPolicy'])->name('policy_detail');
