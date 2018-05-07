<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\UserReview;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
  public function create($id){
    $movie = Movie::find($id);
    $review = UserReview::find($id);
    return view('Review/review', compact('movie'), compact('review'));
  }

  public function delete($id){
    $review = UserReview::find($id);
    $review->delete();
    return redirect('/movies');
  }

  public function showeditReview($id){
    $review = UserReview::find($id);
    //works
    return view('Review/edit_review', compact('review'));
  }

  public function edit(Request $request, $id)
  {
    $this->validate($request, [
      'review_content' => 'required',
    ]);

    $review = UserReview::find($id);
    $review->review_content=request('review_content');
    $review->save();

    return redirect('/movies');//->action(
          //'UserProfileController@getUser', ['id' => $comment->user_profile_id]);
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
    return redirect()->action('MovieController@detail',['id'=>$id]);
  }
}
