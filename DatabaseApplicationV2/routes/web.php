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

Route::get('/home', function () {
    return view('home');
});

Route::get('/', 'HomeController@index');

Route::get('/about', function () {
    return view('./about');
});

Route::get('/support', function () {
    return view('support');
});

=======
Route::get('/login', 'LoginController@login');

Route::post('/contact/submit', 'MessagesController@submit');
Route::get('/admin/movie', 'AdminController@create');

//Route::get('/logout', 'LoginController@logout');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return view('home');
      //->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});

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
