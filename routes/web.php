<?php

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/create', function () {
    return view('pages.create');
});

Route::get('/users','UsersController@index');
Route::get('/users/{id}','UsersController@getID')->where('id','[0-9]+');
Route::get('/users/{name}','UsersController@getName')->where('name','[A-Za-z][A-Za-z0-9]*');

Route::get('/projects','ProjectsController@index');
Route::get('/projects/{id}','ProjectsController@getID')->where('id','[0-9]+');
Route::get('/projects/{name}','ProjectsController@getName')->where('name','[A-Za-z][A-Za-z0-9]*');

Route::get('/issues','IssuesController@index');
Route::get('/issues/{id}','IssuesController@getID')->where('id','[0-9]+');
Route::get('/issues/{name}','IssuesController@getName')->where('name','[A-Za-z][A-Za-z0-9]*');

Route::get('/categories','CategoriesController@index');
Route::get('/categories/{id}','CategoriesController@getID')->where('id','[0-9]+');
Route::get('/categories/{name}','CategoriesController@getName')->where('name','[A-Za-z][A-Za-z0-9]*');

// Route::get('/users/{id}', function ($id) {
//   $user = \App\User::findOrFail($id);
//     return $user;
// })->where('id','[0-9]+');

// Route::get('/users/{name}', function ($name) {
//     return 'Name: '.$user;
// })->where('name','[A-za-z][A-Za-Z0-9]*');

Route::get('/users/{id}/{name}', function($id,$name = null) {
  return 'ID: '.$id.' Name: '.$name;
})->where(['id'=> '[0-9]+','name' => '[A-Za-z][A-Za-z0-9]*']);
