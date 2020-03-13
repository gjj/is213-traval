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

/* Activity Item */
Route::get('/activity/{id}', function () {
    return view('home');
})
->name('activity.item');
