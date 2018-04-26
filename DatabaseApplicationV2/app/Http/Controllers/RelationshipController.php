<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Relationship;
use App\Movie_poster;
use App\User_like;
use App\User;
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


  public function addFriend(){
    $current_user_id = Auth::id();
    $relationship = new Relationship;
    $relationship->relating_user_id = $current_user_id;
    $relationship->related_user_id = $_POST['other_user_id'];
    $relationship->status = 'FRIEND';
    $relationship->save();
  }

  public function deleteFriend(){
    $other_user_id = $_POST['other_user_id'];
    $user_id = $_POST['user_id'];
    $relationship=Relationship::where([['relating_user_id',$user_id],['related_user_id',$other_user_id]])->first();
    $relationship->delete();
  }
}
