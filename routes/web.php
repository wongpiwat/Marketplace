<?php

Route::get('/', function() {
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

<<<<<<< HEAD
Route::get('/market','MarketsController@index');
Route::get('/market/create','MarketsController@create');
Route::post('/market','MarketsController@store');
Route::get('/','HomepageController@index');
=======
Route::resource('/markets', 'MarketsController');

>>>>>>> e037eb3b96d3b45e45033524033fc90a97d56562

Route::get('/webboard/{id}','WebboardController@index');
