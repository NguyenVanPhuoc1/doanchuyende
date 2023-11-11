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

Route::get('/', function () {
    // return view('frontend.tintuc');
    // return view('frontend.trangchu');
    // return view('admin.trangchu');
    // return view('admin.qlitintuc');
    // return view('admin.crudtintuc');
    return view('admin.qlinhantin');
});
