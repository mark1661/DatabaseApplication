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
    
    $statusF = $relationship->status;

    return $statusF;
  }
    //
}
