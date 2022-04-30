<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookProcessController;
use App\Http\Controllers\ProductsController;
use Illuminate\Contracts\Cache\Store;
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


Route::view('info', 'about')->name('about');

Route::view('contacto', 'contact')->name('contact');

Route::view('inicio', 'home')->name('home');

Route::view('tienda', 'shop')->name('shop');

Route::resource('tienda', ProductsController::class)->names(["index" => "shop"]);

Route::controller(BookingController::class)->group(function () {
    Route::post("reserva", "store")->name("booking");
    Route::get("reserva", "index")->name("booking");
});

Route::view('reservaconfirmada', 'booking_confirmed')->name('booking_confirmed');

//Route::resource('reservas', BookingController::class)->names(["index" => "booking", "store" => "algo"]);

//Route::post('reservas', 'App\Http\Controllers\BookingController@' . 'store')->name("reservas.store");

Route::view('cookies', 'cookies')->name('cookies');

Route::view('cuenta', "account_dashboard")->name('dashboard');

Route::view('producto', 'product')->name('product');

Route::get('/', function () {
    return view('home');
});

Auth::routes();


