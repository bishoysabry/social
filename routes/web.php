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
Route::get('/su', function () {
    return view('inc.signup');
});
Route::get('/si', function () {
    return view('inc.signin');
});

Route::group(['middleware' => 'auth'], function()
{
  Route::post('/signup', 'UserController@postSignUp')->name('signup');
  Route::post('/signin', 'UserController@postSignIn')->name('signin');
  Route::get('/dashboard', 'UserController@getDashBoard')->name('dashboard');

});
