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

/* Homepage */
Route::get('/', function () {
    return view('home');
})
->name('home');

/* Sign in */
Route::get('/signin', function () {
    return view('signin');
})
->name('signin');

/* Search */
Route::get('/search', function () {
    return view('search');
})
->name('search');

/* Activity Item */
Route::get('/activity/{id}', function () {
    return view('activity.item');
})
->name('activity.item');



/* Payment */
Route::get('/payment/checkout', function () {
    return view('payment.checkout');
})
->name('payment.checkout');

Route::get('/payment/result', function () {
    return view('payment.result');
})
->name('payment.result');


/* Orders */
Route::get('/order', function () {
    return view('order.list');
})
->name('order.list');