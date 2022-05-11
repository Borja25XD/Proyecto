<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookProcessController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PitchesController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


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
    Route::post("reservas", "destroy")->name("delete");
    Route::get("reserva", "index")->name("booking");
});

Route::view('reservaconfirmada', 'booking_confirmed')->name('booking_confirmed');

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

// Route::controller((PitchesController::class))->gropup(function () {
//     Route::post("editdisp", "edit")->name(("editdisp"));
// });

//Route::resource('reservas', BookingController::class)->names(["index" => "booking", "store" => "algo"]);

Route::post('/cart-add', CartController::class.'@add')->name('cart.add');

Route::get('/cart-checkout', CartController::class.'@cart')->name('cart.checkout');

Route::post('/cart-clear', CartController::class.'@clear')->name('cart.clear');

Route::post('/cart-removeitem', CartController::class.'@removeitem')->name('cart.removeitem');

//Route::post('reservas', 'App\Http\Controllers\BookingController@' . 'store')->name("reservas.store");

Route::view('cookies', 'cookies')->name('cookies');

Route::view('cuenta', 'account_dashboard')->name('dashboard')->middleware('auth');

Route::view('pedido', 'cart')->name('cart');

Route::get('product/{id}', ProductsController::class.'@show')->name('product');

Route::get('/', function () {
    return view('home');
});

Auth::routes();
