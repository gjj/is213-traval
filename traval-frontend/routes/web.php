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
    return view('auth.signin');
})
->name('signin');

Route::get('/register', function () {
    return view('auth.register');
})
->name('register');

Route::get('/signout', function () {
    return view('auth.signout');
})
->name('signout');

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

/* Voucher */
Route::get('/voucher', function () {
    return view('voucher.item');
})
->name('order.item');

/* Review */
Route::get('/order/{orderid}/review', function () {
    return view('review.post');
})
->name('review.post');

Route::get('/activity/{id}/reviews', function () {
    return view('review.list');
})
->name('review.list');