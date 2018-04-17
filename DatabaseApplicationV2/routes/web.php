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


Route::get('/about', function () {
    return view('./about');
});

Route::get('/support', function () {
    return view('support');
});



Route::get('/admin/movie', 'AdminController@create');

<<<<<<< HEAD
//Route::get('/logout', 'LoginController@logout');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return view('home');
      //->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});
=======
Route::get('/admin/actor', 'AdminController@createactor');


Route::get('/user/{id}/edituserprofile', 'UserController@Edit');
Route::get('/user/{id}/viewuserprofile', 'UserController@View');
>>>>>>> master

Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
