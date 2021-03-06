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

//linyi
//Route::get('/', 'HomeController@index');

Route::get('/about', function () {
    return view('./about');
});

Route::get('/support', function () {
    return view('support');
});

Route::post('/contact/submit', 'MessagesController@submit');
Route::get('/admin/addmovie', 'AdminController@addmovie');
Route::get('/admin/index','AdminController@index');
Route::get('admin/supportindex', 'AdminController@supportindex');
//Route::get('/logout', 'LoginController@logout');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return view('home');
      //->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});
Route::get('/admin/actor', 'AdminController@createactor');
Route::get('/admin/login','AdminController@Login');
Route::get('/user/{id}/edituserprofile', 'UserController@Edit');
Route::get('/user/{id}/viewuserprofile', 'UserController@View');
Route::get('/user/{id}/deleteuserprofile', 'UserController@Delete');
Route::get('/user/{id}/viewfriends', 'UserController@ViewFriends');
Route::get('/user/{id}/deletefriend', 'UserController@DeleteFriend');

Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();

//Routes for movies
Route::get('/movies','MovieController@index');

Route::get('/movies/create','MovieController@create');
Route::post('/movies/store','MovieController@store');

Route::get('/movies/detail/{id}','MovieController@detail');
Route::get('/movies/show/{id}','MovieController@show');
Route::post('/movies/edit/{id}','MovieController@edit');

Route::get('/movies/delete/{id}','MovieController@deleteConfirmation');
Route::post('/movies/delete/{id}','MovieController@delete');
