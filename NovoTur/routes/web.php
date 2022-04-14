<?php

use App\Http\Controllers\BookingController;
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

Route::resource('reservas', BookingController::class)->names(["index" => "booking"]);

Route::view('cookies', 'cookies')->name('cookies');

Route::view('cuenta', "account_dashboard")->name('dashboard');

Route::get('/', function () {
    return view('home');
});

Auth::routes();


