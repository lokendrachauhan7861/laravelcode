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
//Route::get('admin/login/{name}', [App\Http\Controllers\Admin\LoginController::class, 'adminlogin']);




Route::group(['prefix' => 'admin', 'middleware'=>['auth','role:1']], function() {

Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);

Route::get('allUser', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('allUser');
Route::get('user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('userdelete');
Route::get('user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user/edit');
Route::post('user/update/{id?}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user/update');
 

	});

Route::group(['middleware'=>['auth','role:2']], function() {

Route::get('user/dashboard', [App\Http\Controllers\UserDashboardController::class, 'userDashboard'])->name('userDashboard');
Route::get('user/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('user/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateProfile');

});

Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout']);
Route::get('logout', [App\Http\Controllers\UserDashboardController::class, 'logout']);
