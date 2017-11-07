<?php

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

Route::get('/', function () {
    return view('welcome');
});

//route for verification
Route::get("/bot-a", "MainController@receive")->middleware("verify");
Route::post("/bot-a", "MainController@receive");
Route::resource('profile','ProfileController');