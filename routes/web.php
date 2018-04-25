<?php

// Route::get('/', function() {
//   return view('home.index');
// });


Route::get('/','HomepageController@index');

Route::get('/login', function() {
  return view('auth.login');
});

Route::get('/login', function() {
  return view('auth/login');
});

Route::get('/register', function() {
  return view('auth/register');
});

Route::get('/management', function(){
  return view('home.management');
});



Route::resource('/markets', 'MarketsController');
Route::resource('/reservation', 'ReservationsController');
Route::resource('/users', 'UsersController');
Route::resource('/logs', 'LogsController');

Route::get('/create','CreateMarketController@index');

Route::get('/webboards/','WebboardController@index');
Route::post('/webboards/','WebboardController@store');  
Route::get('/webboards/{webboard}','WebboardController@show');
Route::post('/webboards/{webboard}/updateComment','WebboardController@editComment');
Route::post('/webboards/{webboard}/addComment','WebboardController@addComment');
// Route::post('/webboard/{id_market}/create','WebboardController@create');
Route::delete('/webboards/{webboard}' , 'WebboardController@destroy');
Route::delete('/webboards/{webboard}/{webboardReply}','WebboardController@destroyComment');
// Route::delete('/webboard/{webboard}/deleteTopic','WebboardController@destroyComment');

Route::post('/webboards/{webboard}/updateTopic','WebboardController@editTopic');

Auth::routes();
