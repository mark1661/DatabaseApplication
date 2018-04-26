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

Route::get('/success/{id}', 'UserProfileController@successRedirect');
Route::get('/successDelete/{id}', 'UserProfileController@successDeleteRedirect');


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

Route::get('/viewuserprofile/{id}', 'UserProfileController@getUser');
//shouldn't show on user profile, should be deleted when user is deleted anyhoo
Route::get('/user/{id}/deleteuserprofile', 'UserController@Delete');

Route::get('/user/{id}/viewfriends', 'UserController@ViewFriends');
Route::get('/user/{id}/deletefriend', 'UserController@DeleteFriend');

Route::post('/submit', 'TicketController@submit');

//edit user profile
Route::get('/edituserprofile/{id}', 'UserProfileController@showeditUserProfile');
Route::post('/submit/{id}', 'UserProfileController@edit');

//review
Route::get('/createReview/{id}', 'ReviewController@create');
Route::post('/newreview/{id}', 'ReviewController@submit');


Route::post('/addFriend','RelationshipController@addFriend');
Route::post('/unfriend','RelationshipController@deleteFriend');
//Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();

//Routes for movies
Route::get('/movies','MovieController@index');

//For admin purposes to view/delete users
Route::get('/users','UserController@index');
Route::get('/users/delete/{id}','UserController@deleteConfirmation');
Route::post('/delete/{id}','UserController@delete');

Route::get('/movies/create','MovieController@create');
Route::post('/movies/store','MovieController@store');

Route::get('/movies/detail/{id}','MovieController@detail')->  name('movie_detail');
Route::post('/movies/detail/{id}','MovieClipController@store');

Route::get('/movies/show/{id}','MovieController@show');
Route::post('/movies/edit/{id}','MovieController@edit');

Route::get('/movies/delete/{id}','MovieController@deleteConfirmation');
Route::post('/movies/delete/{id}','MovieController@delete');

Route::get('/movies/clip/{id}','MovieClipController@show');
Route::post('/movies/clip/{id}','MovieClipController@delete');

Route::get('/movies/setTrailer/{id}','MovieClipController@setToTrailer');

Route::post('/like','UserLikeController@like');
Route::post('/unlike','UserLikeController@unlike');
