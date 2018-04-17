<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

<<<<<<< HEAD
Route::get('/home', function () {
    return view('home');
});

Route::get('/', 'HomeController@index');
=======
>>>>>>> parent of 28eead53... added login/logout feature

Route::get('/about', function () {
    return view('./about');
});

Route::get('/support', function () {
    return view('support');
});

<<<<<<< HEAD
=======
Route::get('/login', 'LoginController@login');
=======
Route::get('/login', function ()
{
  return view('login');
});
>>>>>>> parent of 28eead53... added login/logout feature

Route::post('/contact/submit', 'MessagesController@submit');
Route::get('/admin/movie', 'AdminController@create');

Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Routes for movies
Route::get('/movies','MovieController@index');

Route::get('/movies/create','MovieController@create');
Route::post('/movies/store','MovieController@store');

Route::get('/movies/show/{id}','MovieController@show');
Route::post('/movies/edit/{id}','MovieController@edit');

Route::get('/movies/delete/{id}','MovieController@deleteConfirmation');
Route::post('/movies/delete/{id}','MovieController@delete');
