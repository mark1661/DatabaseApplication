<?php
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('/resetPassword/{token}', 'UserController@resetPassword');
Route::post('/user/passwordSuccess/{id}', 'UserController@passwordSuccess');
Route::get('/', function ()
{
  $user = Auth::user();
  if(is_null($user))
  {
    return view('home');
  }
  else
  {
    if($user->verified == 0)
    {
      return view('layouts/verificationFailed');
    }
    else
    {
      return view('home');
    }
  }
})->name('home');

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
Route::post('/support/submit', 'SupportController@create');
Route::get('/support/submitSuccessful', 'SupportController@createSuccess');
Route::get('/support/index', 'SupportController@index');
Route::get('/support/show/{id}', 'SupportController@show');
Route::get('/support/edit/{id}', 'SupportController@edit');
Route::get('/support/delete/{id}', 'SupportController@delete');
Route::post('/support/update/{id}','SupportController@update');
Route::get('/support/deleteToPost/{id}', 'SupportController@deleteToPost');

Route::get('/admin/addmovie', 'AdminController@addmovie');
Route::get('/admin/index','AdminController@index');
Route::get('/admin/actor', 'AdminController@createactor');
Route::get('/admin/login','AdminController@Login');
Route::get('/admin/listOfUsers', 'AdminController@showListOfUsers');
Route::get('/admin/sendEmail/{id}', 'AdminController@sendEmail');
//Route::get('/logout', 'LoginController@logout');

Route::get('/logout', 'HomeController@logout');

Route::get('/viewuserprofile/{id}', 'UserProfileController@getUser');
Route::get('/user/{id}/viewuserprofile', 'UserProfileController@getUser');
Route::get('/user/{id}/deleteuserprofile', 'UserController@deleteConfirmation');

Route::get('/user/{id}/viewfriends', 'UserController@ViewFriends');
Route::get('/user/{id}/deletefriend', 'UserController@DeleteFriend');

Route::post('/submit', 'TicketController@submit');

//edit user profile
Route::get('/edituserprofile/{id}', 'UserProfileController@showeditUserProfile');
Route::post('/submit/{id}', 'UserProfileController@edit');

//review
Route::get('/createReview/{id}', 'ReviewController@create');
Route::post('/newreview/{id}', 'ReviewController@submit');

//search
Route::post('search/results', 'SearchController@processSearch');
//Route::get('', '');

//friends
Route::get('/getFriends', 'RelationshipController@getFriends');
Route::post('/addFriend','RelationshipController@addFriend');
Route::post('/unfriend','RelationshipController@deleteFriend');
//Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();


//For admin purposes to view/delete users
Route::get('/users','UserController@index');
Route::get('/users/delete/{id}','UserController@deleteConfirmation');
Route::post('/delete/{id}','UserController@delete');

//Routes for movies
Route::get('/movies','MovieController@index');
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
//User like
Route::post('/like','UserLikeController@like');
Route::post('/unlike','UserLikeController@unlike');
//Movie list
Route::get('/list/add/{id}','MovieListController@add');
Route::get('/list/view','MovieListController@viewList');
Route::get('/list/clear','MovieListController@clear');
Route::get('/list/delete/{id}','MovieListController@delete');
//Actor
Route::get('/add/actors','ActorController@showActorsToAdd');
Route::get('/delete/actors','ActorController@showActorsToDelete');
Route::get('/actor/create', 'ActorController@create');
Route::post('/actor/store', 'ActorController@store');
Route::get('/actor/index', 'ActorController@index');
Route::get('/actor/edit/{id}','ActorController@edit');
Route::post('/actor/update/{id}', 'ActorController@update');
Route::get('/actor/delete/{id}', 'ActorController@delete');
Route::get('/actor/remove/{id}', 'ActorController@remove');
