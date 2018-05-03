<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\User_profile;
use App\user_profile_comment;
use App\Relationship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;

class UserProfileController extends Controller
{

  public function __construct(){
    $this->middleware('profileCheck');
  }

  public function successRedirect($id){
    return redirect()->action(
      'UserProfileController@getUser', ['id' => $id]
    )->with('success', 'Added!');
    //return redirect('/viewuserprofile/')->with('success', 'Added Friend!');
  }

  public function successDeleteRedirect($id){
    return redirect()->action(
      'UserProfileController@getUser', ['id' => $id]
    )->with('success', 'Deleted!');
    //return redirect('/viewuserprofile/')->with('success', 'Added Friend!');
  }

  public function getUser($id){
    $userprofile= User_profile::find($id);
    //$user = User::find($id);
    $name =  User::find($id)['username'];
    //get comments belonging to that profile
    $user_comments = user_profile_comment::where('user_profile_id', $userprofile->user_profile_id)->get();
    //works
    return view('/UserProfile/viewuserprofile', compact('userprofile', 'name', 'user_comments'));
  }

  public function showeditUserProfile($id){
    $userprofile= User_profile::find($id);
    //works
    return view('/UserProfile/edituserprofile', compact('userprofile'));
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
