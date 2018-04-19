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
    $userprofile->first_name=request('userfirstname');
    $userprofile->last_name=request('userlastname');
    $userprofile->gender=request('usergender');
    //$userprofile->actor_id=request('actorpicture');
    $userprofile->profile_privacy=request('userprofileprivacy');
    $userprofile->save();
    return redirect("/UserProfile/viewuserprofile");
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
