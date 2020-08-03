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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testPage', function () {
    echo "<h3>Hi there! Thank you for visiting our site.</h3> This page is being tested by our developers.";
});

Route::get('/home', 'HomeController@index')->name('home');

