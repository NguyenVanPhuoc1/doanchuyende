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
Route::get('/san-pham', [ProductController::class, 'index']);

use App\Http\Controllers\NewsController;
//Page Tin Tức
Route::get('/tin-tuc', [NewsController::class, 'viewTinTuc']);
