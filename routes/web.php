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
})->name('home');


Route::group(['middleware' => 'web'], function()
{
  Route::post('/signup', 'UserController@SignUp')->name('signup');
  Route::post('/signin', 'UserController@SignIn')->name('signin');

});
Route::get('/dashboard', [
  'uses'=>'PostController@index',
  'as'=>'dashboard',
  'middleware'=>'Authenticate',
]);
Route::post('/createpost', [
  'uses'=>'PostController@store',
  'as'=>'createpost',
  'middleware'=>'Authenticate'
]);
Route::get('/deletepost/{id}', [
  'uses'=>'PostController@destroy',
  'as'=>'deletepost',
  'middleware'=>'Authenticate'
]);
Route::post('/editajax', [
  'uses'=>'PostController@editajax',
  'as'=>'editajax',
  'middleware'=>'Authenticate'
]);
Route::get('/account', [
  'uses'=>'UserController@getAccount',
  'as'=>'account',
  'middleware'=>'Authenticate'
]);
Route::get('/accountImage/{filename}', [
  'uses'=>'UserController@getImage',
  'as'=>'image',
  'middleware'=>'Authenticate'
]);
Route::post('/account', [
  'uses'=>'UserController@updateAccount',
  'as'=>'account.save',
  'middleware'=>'Authenticate'
]);

Route::post('/like', [
    'uses' => 'PostController@LikePost',
    'as' => 'like',
    'middleware'=>'Authenticate'
]);
Route::post('/edit', function (\Illuminate\Http\Request $request){
  return response()->json(['message'=>$request['body']]);
})->name('edit');
Route::get('/logout', [
  'uses'=>'UserController@logOut',
  'as'=>'logout',
]);
