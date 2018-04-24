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
<<<<<<< HEAD
Route::get('/','HomepageController@index');
Route::get('/market','MarketsController@index');
Route::get('/market/create','MarketsController@create');
Route::post('/market','MarketsController@store');
=======

Route::resource('/markets', 'MarketsController');
>>>>>>> 8ad0d5e2ed9718bc61c601d2d3eb3d96929ca4a0


Route::get('/webboard/{id}','WebboardController@index');
