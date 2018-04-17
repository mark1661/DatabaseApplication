<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\User_profile;

class UserProfileController extends Controller
{


  public function userShow($id){
    $userprofile= User_profile::find($id);
    //make or edit the appropriate view in here
    //also add the route for it
    return view('/viewuserprofile', compact('userprofile'));
  }


  public function Edit()
  {
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
