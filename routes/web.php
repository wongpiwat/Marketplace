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

Route::get('/market','MarketController@index');
Route::get('/market/create','MarketController@create');
Route::post('/market','MarketController@store');


Route::get('/webboard/{id}','WebboardController@index');
