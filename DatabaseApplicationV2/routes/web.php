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

Route::get('/support',  function () {
    return view('support');
})->middleware('refuseNoAuth');


Route::get('/error',  function ()
{
    return view('error_page');
});

Route::get('/error/ProhibitedURL', function()
{
  return view('errorProhibitedURL');
});


Route::get('/user/privateProfile', function()
{
    return view('privateProfilePage');
});

Route::get('/user/friendsOnlyProfile', function()
{
    return view('friendsOnlyProfilePage');
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

//profile
Route::get('/viewuserprofile/{id}', 'UserProfileController@getUser');
Route::get('/user/{id}/viewuserprofile', 'UserProfileController@getUser');
Route::get('/user/{id}/deleteuserprofile', 'UserController@deleteConfirmation');


Route::post('/submit', 'TicketController@submit');

//edit user profile
Route::get('/edituserprofile/{id}', 'UserProfileController@showeditUserProfile')->middleware('checkIfActualUser');
Route::post('/submit/{id}', 'UserProfileController@edit');

//review
Route::get('/createReview/{id}', 'ReviewController@create')->middleware('refuseNoAuth');
Route::post('/newreview/{id}', 'ReviewController@submit');
Route::get('/deleteReview/{id}','ReviewController@delete');

//edit reviews
Route::get('/editReview/{id}', 'ReviewController@showeditReview')->middleware('redirectNotLoggedIn', 'RedirectIfNotBelongsReview');
Route::post('/submitEditReview/{id}', 'ReviewController@edit');

//search
Route::post('search/results', 'SearchController@processSearch');
//Route::get('', '');

//friends
Route::get('/getFriends', 'RelationshipController@getFriends')->middleware('redirectNotLoggedIn');
Route::post('/addFriend','RelationshipController@addFriend');
Route::post('/unfriend','RelationshipController@deleteFriend');
Route::get('/deleteFromList/{id}', 'RelationshipController@deleteFromList');
Route::get('/user/{id}/viewfriends', 'UserController@ViewFriends');
Route::get('/user/{id}/deletefriend', 'UserController@DeleteFriend');
//Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();


//komments
Route::get('/createComment/{id}', 'CommentController@create')->middleware('redirectNotLoggedIn');
Route::post('/newComment/{id}', 'CommentController@submit');
Route::post('/deleteComment/{id}','CommentController@delete');


//edit user komment
Route::get('/editComment/{id}', 'CommentController@showeditComment')->middleware('redirectNotLoggedIn', 'RedirectIfNotBelongsComment');
Route::post('/submitComment/{id}', 'CommentController@edit');

//Routes for movies
Route::get('/movies','MovieController@index');

//For admin purposes to view/delete users
Route::get('/users','UserController@index')->middleware('RedirectIfNotAdmin');
Route::get('/users/delete/{id}','UserController@deleteConfirmation')->middleware('RedirectIfNotAdmin');
Route::post('/delete/{id}','UserController@delete');

//Routes for movies
Route::get('/movies','MovieController@index');
Route::get('/movies/create','MovieController@create')->middleware('RedirectIfNotAdmin');
Route::post('/movies/store','MovieController@store');

Route::get('/movies/detail/{id}','MovieController@detail')->  name('movie_detail');
Route::post('/movies/detail/{id}','MovieClipController@store');

Route::get('/movies/show/{id}','MovieController@show')->middleware('RedirectIfNotAdmin');
Route::post('/movies/edit/{id}','MovieController@edit');

Route::get('/movies/delete/{id}','MovieController@deleteConfirmation')->middleware('RedirectIfNotAdmin');
Route::post('/movies/delete/{id}','MovieController@delete');

Route::get('/movies/clip/{id}','MovieClipController@show');
Route::post('/movies/clip/{id}','MovieClipController@delete');

Route::get('/movies/setTrailer/{id}','MovieClipController@setToTrailer')->middleware('RedirectIfNotAdmin');
Route::get('/movies/setPoster/{id}','MoviePosterController@setToPoster');
Route::get('/movies/poster/{id}','MoviePosterController@delete')->middleware('RedirectIfNotAdmin');
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
Route::get('/actor/view/{id}', 'ActorController@view');
Route::get('/actor/edit/{id}','ActorController@edit');
Route::post('/actor/update/{id}', 'ActorController@update');
Route::get('/actor/delete/{id}', 'ActorController@delete');
Route::get('/actor/remove/{id}', 'ActorController@remove');
