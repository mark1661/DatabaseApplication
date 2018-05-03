<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\UserReview;
use App\user_profile_comment;
use App\User_profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{

  public function create($id){
    $userprofile = User_profile::find($id);
    return view('/user_profile_comments_view', compact('userprofile'));
  }

  public function delete($id){
    $comment = user_profile_comment::find($id);
    $user_id = Auth::user()->user_id;
    $comment->delete();
    return redirect()->action(
      'UserProfileController@successDeleteRedirect', ['id' => $comment->user_profile_id]);
  }


  public function showeditComment($id){
    $comment = user_profile_comment::find($id);
    //works
    return view('/edit_profile_comment', compact('comment'));
  }

  public function edit(Request $request, $id)
  {
    $this->validate($request, [
      'comment_string' => 'required',
    ]);

    $comment = user_profile_comment::find($id);
    $comment->comment_string=request('comment_string');
    $comment->save();

    return redirect()->action(
          'UserProfileController@getUser', ['id' => $comment->user_profile_id]);
  }

  public function submit(Request $request, $id)
  {
    $userprofile = User_profile::find($id);

    $this->validate($request, [
      'comment_string' => 'required',
    ]);

    // Create New Komment
    $comment = new user_profile_comment;
    $comment->user_profile_id = $userprofile->user_profile_id;
    $comment->user_id = Auth::user()->user_id;
    //$date = date('Y-m-d H:i:s');
    $comment->comment_string = $request->input('comment_string');
    //$review->date = $date;
    // Save Messages
    $comment->save();

    // Redirect
    //redirect to user profile ya lazy dick
    return redirect()->action(
      'UserProfileController@successRedirect', ['id' => $id]);
  }
}
