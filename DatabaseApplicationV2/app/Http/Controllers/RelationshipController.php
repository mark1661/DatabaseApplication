<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Relationship;
use App\Movie_poster;
use App\User_like;
use App\User;
use App\User_profile;
use DB;
use Illuminate\Support\Facades\Auth;

class RelationshipController extends Controller
{
  public static function getRelationship($id){
    $user = User::find($id);
    $login_user_id = Auth::id();

    $relationship = DB::table('relationships')->where([
        ['relating_user_id', '=', $login_user_id],
        ['related_user_id', '=', $user->user_id],
        ['status', '=', 'FRIEND'],
    ])->first();

    if (empty($relationship->status)) {
      $statusF = null;
    }
    else {
      $statusF = $relationship->status;
    }

    return $statusF;
  }


  public static function getId($id){
    $login_user_id = Auth::id();
    $relationship = DB::table('relationships')->where([
        ['relating_user_id', '=', $login_user_id],
        ['related_user_id', '=', $id],
        ['status', '=', 'FRIEND'],
    ])->first();

    return $relationship->relationship_id;
  }

  public function getFriends(){
    //$user = User::find($id);
    $login_user_id = Auth::id();

    $userprofiles = DB::select('select username, file_path, user_id from users, user_profiles
    where user_id in (
      select B.related_user_id from relationships B where B.status = ? AND B.relating_user_id = ?)
      AND user_id = user_profile_id',

       ['FRIEND', $login_user_id]);

  //stupid sql, couldn't get rid of duplicate relationship ids in above query

    return view('UserProfile/viewfriends', compact('userprofiles'));
  }


  public function addFriend(){
    $current_user_id = Auth::id();
    $relationship = new Relationship;
    $relationship->relating_user_id = $current_user_id;
    $relationship->related_user_id = $_POST['other_user_id'];
    $relationship->status = 'FRIEND';
    $relationship->save();
  }

  public function deleteFromList($id){
    $relationship= Relationship::find($id);
    $relationship->delete();
    return redirect('/');
  }

  public function deleteFriend(){
    $other_user_id = $_POST['other_user_id'];
    $user_id = $_POST['user_id'];
    $relationship=Relationship::where([['relating_user_id',$user_id],['related_user_id',$other_user_id]])->first();
    $relationship->delete();
  }
}
