<?php

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/login', function() {
  return view('auth.login');
});

Route::get('/create', function () {
    return view('pages.create');
});

Route::get('/users','UsersController@index');
Route::get('/users/{id}','UsersController@getID')->where('id','[0-9]+');
Route::get('/users/{name}','UsersController@getName')->where('name','[A-Za-z][A-Za-z0-9]*');
