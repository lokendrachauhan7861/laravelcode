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
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/login', [App\Http\Controllers\Admin\LoginController::class, 'adminlogin']);
Route::get('admin/login/{name}', [App\Http\Controllers\Admin\LoginController::class, 'adminlogin']);



Route::get('seller/dashboard', [App\Http\Controllers\SellerDashboardController::class, 'sellerdashboard'])->middleware('role:2');

Route::group(['middleware'=>['auth','role:1']], function() {
Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
	});

Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout']);
