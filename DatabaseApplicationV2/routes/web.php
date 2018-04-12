<?php
Route::get('/', function () {
    return view('home');
});


Route::get('/about', function () {
    return view('./about');
});

Route::get('/support', function () {
    return view('support');
});

Route::get('/login', function ()
{
  return view('login');
});

Route::get('/admin/movie', 'AdminController@create');
Route::get('/movies','MovieController@index');

Route::post('/contact/submit', 'MessagesController@submit');
