<?php
Route::get('/', 'HomeController@index');

Route::get('/about', function () {
    return view('./about');
});

Route::get('/support', function () {
    return view('support');
});

Route::get('/login', 'LoginController@login');

Route::post('/contact/submit', 'MessagesController@submit');
Route::get('/admin/movie', 'AdminController@create');

//Routes for movies
Route::get('/movies','MovieController@index');

Route::get('/movies/create','MovieController@create');
Route::post('/movies/store','MovieController@store');

Route::get('/movies/show/{id}','MovieController@show');
Route::post('/movies/edit/{id}','MovieController@edit');

Route::get('/movies/delete/{id}','MovieController@deleteConfirmation');
Route::post('/movies/delete/{id}','MovieController@delete');
