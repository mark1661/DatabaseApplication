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

Route::get('/admin/actor', 'AdminController@createactor');


Route::get('/user/{id}/edituserprofile', 'UserController@Edit');
Route::get('/user/{id}/viewuserprofile', 'UserController@View');

Route::post('/contact/submit', 'MessagesController@submit');
