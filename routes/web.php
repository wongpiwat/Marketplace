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

Route::get('/create-market','CreateMarketController@index');
Route::post('/create-market','CreateMarketController@store');


Route::get('/webboard/{id}','WebboardController@index');
