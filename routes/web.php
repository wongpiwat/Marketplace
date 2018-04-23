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

Route::get('/market','MarketsController@index');
Route::get('/market/create','MarketsController@create');
Route::post('/market','MarketsController@store');


Route::get('/webboard/{id}','WebboardController@index');
