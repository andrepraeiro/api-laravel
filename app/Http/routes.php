<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Route::group(['middleware' => ['web']], function () {
    //
});
*/

Route::group(array('prefix' => 'api'), function(){
  Route::get('/',function(){
    return response()->json([
      'message' => 'Jobs API', 
      'status' => 'Connected']);
  });
  Route::resource('jobs','JobsController');
  Route::resource('companies','CompaniesController');
  Route::post('auth/login','AuthController@authenticate');
});

Route::get('/', function(){
  return redirect('api');
});

