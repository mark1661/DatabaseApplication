<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\UserReview;
use App\user_profile_comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  public function create($id){
    $movie = Movie::find($id);
    return view('Review/review', compact('movie'));
  }

  public function delete($id){
    $review = UserReview::find($id);
    $review->delete();
    return redirect('/movies');
  }

  public function submit(Request $request, $id)
  {
    $movie = Movie::find($id);

    $this->validate($request, [
      'review_content' => 'required',
    ]);

    // Create New Message
    $review = new UserReview;
    $review->movie_id = $movie->id;
    $review->user_id = Auth::user()->user_id;
    $date = date('Y-m-d H:i:s');
    $review->review_content = $request->input('review_content');
    $review->date = $date;
    // Save Messages
    $review->save();

    // Redirect
    return redirect('/movies');
  }
}
