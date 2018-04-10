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
    return view('home.index');
});

// Route::get('/users', function () {
//   $users = \App\User::all();
//     return $users;
// });
Route::get('/users/welcome','UsersController@showWelcome')->where('name','[A-Za-z][A-Za-z0-9]*');

Route::get('/users','UsersController@index');

// Route::get('/users/1', function () {
//   $user = \App\User::find(1);
//     return $user;
// });

Route::get('/users/{id}','UsersController@show')->where('id','[0-9]+');

// Route::get('/users/{id}', function ($id) {
//   $user = \App\User::findOrFail($id);
//     return $user;
// })->where('id','[0-9]+');


Route::get('/users/{name}','UsersController@showName')->where('name','[A-Za-z][A-Za-z0-9]*');
// Route::get('/users/{name}', function ($name) {
//     return 'Name: '.$user;
// })->where('name','[A-za-z][A-Za-Z0-9]*');

Route::get('/users/{id}/{name}', function($id,$name=null) {
  return 'ID: '.$id.' Name: '.$name;
})->where(['id'=> '[0-9]+','name' => '[A-Za-z][A-Za-z0-9]*']);
