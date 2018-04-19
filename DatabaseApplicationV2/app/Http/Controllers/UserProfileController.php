<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\User_profile;

class UserProfileController extends Controller
{


  public function getUser($id){
    $userprofile= User_profile::find($id);
    //$user = User::find($id);
    $name =  User::find($id)['username'];
    //works
    return view('/UserProfile/viewuserprofile', compact('userprofile', 'name'));
  }


  public function edit($id)
  {
    $userprofile= User_profile::find($id);
    $movie->name=request('name');
    $movie->overview=request('overview');
    $movie->poster=request('poster');
    $movie->actor_id=request('actor');
    $movie->clip_id=request('clip');
    $movie->release_date=request('release_date');
    $movie->genre=request('genre');
    $movie->save();
    return redirect('/movies');
    return view("edituserprofile");
  }

  public function View()
  {
    return view("viewuserprofile");
  }

  public function Delete()
  {
    return view("deleteuserprofile");
  }

  public function ViewFriends()
  {
    return view("viewfriends");
  }
}
