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
Route::get('/cart', function () {
    return view('cart.cart');
})
->name('cart');

Route::get('/payment/checkout', function () {
    return view('payment.checkout');
})
->name('payment.checkout');

Route::get('/payment/success', function () {
    return view('payment.success');
})
->name('payment.success');

/* Orders */
Route::get('/order', function () {
    return view('order.list');
})
->name('order.list');

/* Voucher */
Route::get('/voucher/view/{guid}', function () {
    return view('voucher.item');
})
->name('voucher.item');

/* Review */
Route::get('/order/item/{orderItemId}/review', function () {
    return view('review.post');
})
->name('review.post');

Route::get('/activity/{id}/reviews', function () {
    return view('review.list');
})
->name('review.list');

/* Merchant */
Route::get('/merchant/register', function () {
    return view('merchant.register');
})
->name('merchant.register');
Route::get('/merchant/signin', function () {
    return view('merchant.signin');
})
->name('merchant.signin');
Route::get('/merchant/signout', function () {
    return view('merchant.signout');
})
->name('merchant.signout');

Route::get('/merchant/scan', function () {
    return view('merchant.scan');
})
->name('merchant.scan');

Route::get('/merchant/redeem/{guid}', function () {
    return view('merchant.redeem');
})
->name('merchant.redeem');