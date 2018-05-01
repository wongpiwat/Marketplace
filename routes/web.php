<?php

// Route::get('/', function() {
//   return view('home.index');
// });


Route::get('/','HomeController@index');

Route::get('/management', function(){
  return view('home.management');
});

Route::get('/reservations/create/{market}', 'ReservationsController@create')->where('market','[0-9]+');
Route::post('/reservations/create/{market}', 'ReservationsController@create')->where('market','[0-9]+');

Route::delete('/markets/{market}/{zone}' , 'MarketsController@deleteZone')->where('market','[0-9]+')->where('zone','[0-9]+');
Route::put('/markets/{market}/{reservation}/cancel' , 'ReservationsController@cancelReservation')->where('market','[0-9]+')->where('reservation','[0-9]+');
Route::put('/markets/{market}/{reservation}/pay' , 'ReservationsController@payReservation')->where('market','[0-9]+')->where('reservation','[0-9]+');
Route::get('/markets/{market}/{reservation}/payment' , 'ReservationsController@paymentForm')->where('market','[0-9]+')->where('reservation','[0-9]+');

Route::get('/markets/page/{market}','MarketsController@page')->where('market','[0-9]+');

Route::get('/markets/form', 'MarketsController@form');

Route::get('/reservations/checkin/{market}/{reservation}','ReservationsController@checkIn')->where('market','[0-9]+')->where('reservation','[0-9]+');
Route::post('/reservations/checkin/{market}/{reservation}','ReservationsController@storeCheckIn')->where('market','[0-9]+')->where('reservation','[0-9]+');

Route::get('/reservations/{market}/{reservation}','ReservationsController@show')->where('market','[0-9]+')->where('reservation','[0-9]+');



Route::get('/markets/reservations/form/{market}', 'MarketsController@reservationsForm')->where('market','[0-9]+');
Route::get('/users/form', 'UsersController@form');
Route::get('/logs/form', 'LogsController@form');
Route::get('/feedbacks/form', 'FeedbacksController@form');

Route::resource('/markets', 'MarketsController');
Route::resource('/reservations', 'ReservationsController');
Route::resource('/users', 'UsersController');
Route::resource('/logs', 'LogsController');
Route::resource('/feedbacks', 'FeedbacksController');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/display','HomeController@display');


Route::delete('/support/{webboard}/{market}/{webboardReply}/delete' , 'WebboardsController@destroySupportComment');
Route::get('/webboards/','WebboardsController@index');
Route::post('/webboards/','WebboardsController@store');
Route::get('/webboards/general','WebboardsController@general');
Route::get('/webboards/markets','WebboardsController@markets');
Route::get('/webboards/problems','WebboardsController@problems');
Route::get('/webboards/{webboard}','WebboardsController@show');
Route::post('/webboards/{webboard}/updateComment','WebboardsController@editComment');
Route::post('/webboards/{webboard}/addComment','WebboardsController@addComment');
Route::delete('/webboards/{webboard}' , 'WebboardsController@destroy');
Route::delete('/webboards/{webboard}/{webboardReply}','WebboardsController@destroyComment');
Route::post('/webboards/{webboard}/updateTopic','WebboardsController@editTopic');


Route::get('/support/{market}','MarketsController@support');
Route::get('/support/{market}/{webboard}', 'MarketsController@supportShow');
Route::post('/webboards/{market}','WebboardsController@storeSupport');
Route::delete('/support/{webboard}/{market}' , 'WebboardsController@destroySupport');

Route::post('/support/{market}/{webboard}/addReplySupport', 'WebboardsController@addReplySupport');
Route::post('/support/{market}/{webboard}/updateComment','WebboardsController@editCommentSupport');
Route::post('/support/{market}/{webboard}/updateTopic','WebboardsController@editTopicSupport');

Auth::routes();

Route::get('/home','HomeController@index');

Route::get('/setting','UsersController@setting');
Route::post('/setting','UsersController@updateSetting');
Route::get('/profile','UsersController@profile');

Route::get('/search/market','MarketsController@search');
Route::get('/search/user','UsersController@search');
Route::get('/search/webboard','WebboardsController@search');
Route::get('/search/feedbacks','FeedbacksController@search');
Route::get('/search/logs','LogsController@search');
