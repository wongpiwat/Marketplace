<?php

Route::get('/', function () {
    return view('home.index');
});

Route::get('/login', function() {
  return view('auth.login');
});

Route::get('/login', function() {
  return view('auth/login');
});

Route::get('/register', function() {
  return view('auth/register');
});





Route::get('/create','CreateMarketController@index');
Route::post('/create','CreateMarketController@store');


Route::get('/users','UsersController@index');
Route::get('/users/{id}','UsersController@getID')->where('id','[0-9]+');
Route::get('/users/{name}','UsersController@getName')->where('name','[A-Za-z][A-Za-z0-9]*');




Route::get('/webboard/{id}','WebboardController@index');
