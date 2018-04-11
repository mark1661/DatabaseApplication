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
    return view('about');
});

Route::get('/support', function () {
    return view('support');
});

Route::get('/login', function ()
{
  return view('login');
});

// This is where an admin can log in
Route::get('/admin', function()
{
  return view('adminlogin');
});

Route::get('/admin/addmovie', function()
{
  return view('addmovie');
});

Route::post('/contact/submit', 'MessagesController@submit');
