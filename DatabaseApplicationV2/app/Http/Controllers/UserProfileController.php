<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\User_profile;
use App\Relationship;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{


  public function getUser($id){
    $userprofile= User_profile::find($id);
    //$user = User::find($id);
    $name =  User::find($id)['username'];
    //works
    return view('/UserProfile/viewuserprofile', compact('userprofile', 'name'));
  }

  public function showeditUserProfile($id){
    $userprofile= User_profile::find($id);
    //$user = User::find($id);
    //$name =  User::find($id)['username'];
    //works
    return view('/UserProfile/edituserprofile', compact('userprofile'));
  }

  public function addFriend($id){
    $user_id = Auth::id();
    $relationship = new Relationship;
    $relationship->relating_user_id = $user_id;
    $relationship->related_user_id = $id;
    $relationship->status = 'FRIEND';
    $relationship->save();
    return redirect('/')->with('success', 'Added Friend!');
  }

  public function viewFriends(){
    
  }

  public function edit($id)
  {
    $userprofile= User_profile::find($id);
    $userprofile->first_name=request('userfirstname');
    $userprofile->last_name=request('userlastname');
    $userprofile->gender=request('usergender');
    $userprofile->location=request('location');
    $userprofile->age=request('userage');
    $userprofile->profile_privacy=request('userprofileprivacy');

    if (request()->hasFile('image')) {
      $path=request()->file('image')->store('public/images');
      $file_name =request()->file('image')->hashName();
      $userprofile->file_path=$path;
      $userprofile->file_name=$file_name;
      $userprofile->save();
    }

    $userprofile->save();
    return redirect('/')->with('success', 'Edited Profile!');
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
