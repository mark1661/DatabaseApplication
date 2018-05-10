<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\User_profile;
use App\UserReview;
use App\user_profile_comment;
use App\Movie_clip;
use App\Relationship;
use Session;
use Auth;

class UserController extends Controller
{
  public function index(){
    $users= User::get();
    return view('Users/index', compact('users'));
  }

  public static function getUserName($id){
    $user = User::find($id);
    $username = $user->username;
    return $username;
  }

  public function delete($id){

    $user= User::find($id);
    $userProfile=User_profile::find($id);
    $enteredPassword = request('userpassword');
    if(Hash::check($enteredPassword, $user->password))
    {
      $profile_comments=user_profile_comment::where('user_id', $id)->delete();
      $user_reviews=UserReview::where('user_id', $id)->delete();
      $relationships=Relationship::where('relating_user_id', $id)->delete();
      $user->delete();
      $userProfile->delete();
      Session::flush();
      Auth::logout();
      return redirect('/');
    }
    elseif (Auth::user()->status === 'ADMIN') {
      $profile_comments=user_profile_comment::where('user_id', $id)->delete();
      $user_reviews=UserReview::where('user_id', $id)->delete();
      $movie_clip=Movie_Clip::where('user_id', $id)->delete();
      $relationships=Relationship::where('relating_user_id', $id)->delete();
      $user->delete();
      $userProfile->delete();
      return redirect('/');
    }
    else
    {
      return view('Users/invalidDelete', compact('user'));
    }

    //$user->delete();
    //return redirect('/users');
  }

  public function deleteConfirmation($id){
    $user= User::find($id);
    $userProfile = User_profile::find($id);
    return view('/Users/delete', compact('user'), compact('userProfile'));
  }

  public function resetPassword($token)
  {
    if(Auth::check() == true)
    {
      Session::flush();
      Auth::logout();
    }
    $user = User::where('email_token', $token)->first();
    return view('Users/emailReceived', compact('user'));
  }

  public function passwordSuccess($id)
  {
    $user = User::find($id);
    $user->password = Hash::make(request('userpassword'));
    $user->save();
    return redirect('/');
  }

}
