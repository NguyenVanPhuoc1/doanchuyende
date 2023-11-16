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

use App\Http\Controllers\NewsController;
//Page Tin Tức
Route::get('/tin-tuc', [NewsController::class, 'viewTinTuc']);
