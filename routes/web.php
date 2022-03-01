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
Route::get('user/verify/{email}', [App\Http\Controllers\Auth\RegisterController::class, 'verifyUser']);
//Route::get('admin/login/{name}', [App\Http\Controllers\Admin\LoginController::class, 'adminlogin']);




Route::group(['prefix' => 'admin', 'middleware'=>['auth','role:1']], function() {

Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);

Route::get('allUser', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('allUser');
Route::get('user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('userdelete');
Route::get('user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user/edit');
Route::post('user/update/{id?}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user/update');


Route::get('add/testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('addTestimonial');
Route::post('storeTestimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('storeTestimonial');
Route::get('allTestimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('allTestimonial');
Route::get('testimonial/delete/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('testimonialdelete');
Route::get('testimonial/edit/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('testimonial/edit');
Route::post('testimonial/update/{id?}', [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('testimonial/update');


Route::get('add/page', [App\Http\Controllers\Admin\PageController::class, 'create'])->name('addPage');
Route::post('storePage', [App\Http\Controllers\Admin\PageController::class, 'store'])->name('storePage');
Route::get('allPage', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('allPage');
Route::get('page/delete/{id}', [App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('pagedelete');
Route::get('page/edit/{id}', [App\Http\Controllers\Admin\PageController::class, 'edit'])->name('page/edit');
Route::post('page/update/{id?}', [App\Http\Controllers\Admin\PageController::class, 'update'])->name('page/update');


Route::get('/export-users',[App\Http\Controllers\Admin\UserController::class,'exportUsers'])->name('export-users'); // export csv
 

	});

Route::group(['middleware'=>['auth','role:2']], function() {

Route::get('user/dashboard', [App\Http\Controllers\UserDashboardController::class, 'userDashboard'])->name('userDashboard');
Route::get('user/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('user/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateProfile');

Route::get('user/product', [App\Http\Controllers\ProductController::class, 'productList'])->name('products.list');
Route::get('user/cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('user/cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('user/update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('user/remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('user/clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');


Route::get('user/productFilter', [App\Http\Controllers\ProductController::class, 'product_ajax_filter'])->name('product_ajax_data_filter');



Route::get('user/fullcalender', [App\Http\Controllers\FullCalenderController::class, 'index']);

Route::post('user/fullcalenderAjax', [App\Http\Controllers\FullCalenderController::class, 'ajax']);



});

Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout']);
Route::get('logout', [App\Http\Controllers\UserDashboardController::class, 'logout']);


Route::get('mailsend', [App\Http\Controllers\UserDashboardController::class, 'mailsend']);

Route::get('getemailfromurl', [App\Http\Controllers\UserDashboardController::class, 'getemailfromurl']);




