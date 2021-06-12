<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChepController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TableBookController;


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/file/download/{customer_id}', [HomeController::class, 'filedownload'])->name('filedownload');

Route::get('/', [FrontendController::class, 'index']);
// FrontendController
Route::get('menu-page' , [FrontendController::class , 'menu'])->name('menu');
Route::get('shop-page' , [FrontendController::class , 'shop'])->name('shop');
Route::get('about-page' , [FrontendController::class , 'about'])->name('about');
Route::get('contact-page' , [FrontendController::class , 'contact'])->name('contact');
Route::get('blog-page' , [FrontendController::class , 'blog'])->name('blog');
Route::get('reservation-page' , [FrontendController::class , 'reservation'])->name('reservation');

Route::get('food-details/{slug}' , [FrontendController::class , 'fooddetails'])->name('food.details');


// Route::get('blog/details/{slug}' , 'FrontendController@blogdetails')->name('blogdetails');
// Route::post('contact/post' , 'FrontendController@contactpost')->name('contactpost');
// Route::get('search' , 'FrontendController@search');

//ProfileController Router
Route::resource('profile', ProfileController::class)->only(['index', 'store']);
Route::post('edit/password' , 'ProfileController@profileeditpassword')->name('editpassword');
Route::post('profile/image/upload' , 'ProfileController@profileimageupload')->name('profileimageupload');

//BannerController Router
Route::resource('banner', BannerController::class)->only(['index', 'store', 'edit', 'update' , 'destroy']);
Route::get('banner/view' , [BannerController::class , 'bannerviewall'])->name('banner.viewall');

//CategoryController Route
Route::resource('category', CategoryController::class)->only(['index', 'store', 'edit', 'update' , 'destroy']);

//TagController Route
Route::resource('tag', TagController::class)->only(['index', 'store', 'edit', 'update' , 'destroy']);

//BannerController Router
Route::resource('food', FoodController::class)->only(['index', 'store', 'edit', 'update' , 'destroy']);
Route::get('food/view' , [FoodController::class , 'foodview'])->name('food.view');

//ChepController Router
Route::resource('chep', ChepController::class)->only(['index', 'store', 'edit', 'update' , 'destroy']);
Route::get('chep/view' , [ChepController::class , 'chepview'])->name('chep.view');

//TableBookController Router
Route::resource('tablebook', TableBookController::class)->only(['index', 'store', 'edit', 'update' , 'destroy']);

//CartController Router
Route::post('cart/store' , [CartController::class , 'cartstore'])->name('cart.store');
Route::post('cart/update' , [CartController::class , 'cartupdate'])->name('cart.update');
Route::get('cart' , [CartController::class , 'cardindex'])->name('card.index');
Route::get('card/{coupon_name}' , [CartController::class , 'cardindex']);
Route::get('cart-delete/{cart_id}' , [CartController::class , 'cartdestroy'])->name('card.delete');

//CustomerController Router
Route::get('checkout' , [CheckoutController::class , 'checkout'])->name('checkout');
Route::post('checkout/post' , [CheckoutController::class , 'checkoutpost']);
Route::post('ajaxRequest' , [CheckoutController::class , 'ajaxRequest']);

//OrderController Router
Route::resource('order' , OrderController::class )->only(['index', 'update' , 'destroy']);
Route::get('order/cancel/{order_id}', [OrderController::class , 'ordercancel'])->name('order.cancel');
Route::get('download/invoice/{order_id}' , [OrderController::class , 'downloadinvoice']);






