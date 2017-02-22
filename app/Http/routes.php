<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'UserController');

//API
Route::get('/api/users',function(){
  return App\User::all();
});

Route::post('/api/users',function(){
  return App\User::create(Request::all());
});

Route::patch('/api/users/{id}',function($id){
  App\User::findOrFail($id)->update(Request::All());
  return Response::json(Request::all());
});

Route::get('/api/users/{id}',function($id){
  return App\User::findOrFail($id);
});

Route::delete('/api/users/{id}',function($id){
  return App\User::destroy($id);
});
