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

  public function getFriends(){
    //$user = User::find($id);
    $login_user_id = Auth::id();

    $userprofiles = DB::select('select DISTINCT username, file_path, user_id from users, user_profiles
    where user_id in (
      select B.related_user_id from relationships B where B.status = ? AND B.relating_user_id = ?)', ['FRIEND', $login_user_id]);

//stupid sql, couldn't get rid of duplicate relationship ids in above query
      $relationshipids = DB::select('select DISTINCT relationship_id from users, relationships
    where user_id in (
      select B.related_user_id from relationships B where B.status = ? AND B.relating_user_id = ?)',['FRIEND', $login_user_id]);

      foreach ($userprofiles as $userprofile) {
        foreach ($relationshipids as $relationship){}
         $user->name;
}




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

  public function delete($id){
    $movie= Movie::find($id);
    $posters=Movie_poster::where('movie_id', $id)->get();
    foreach($posters as $poster){
      Storage::delete('public/images/' . $poster->file_name);
    }
    $deletedPosters=Movie_poster::where('movie_id',$id)->delete();
    $movie->delete();
    return redirect('/movies');
  }

  public function deleteFriend(){
    $other_user_id = $_POST['other_user_id'];
    $user_id = $_POST['user_id'];
    $relationship=Relationship::where([['relating_user_id',$user_id],['related_user_id',$other_user_id]])->first();
    $relationship->delete();
  }
}
