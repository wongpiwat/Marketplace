<?php



Route::get('/login', function() {
  return view('auth.login');
});

Route::get('/login', function() {
  return view('auth/login');
});

Route::get('/register', function() {
  return view('auth/register');
});

Route::resource('/markets', 'MarketsController');


Route::get('/webboard/{id}','WebboardController@index');
