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
    return view('Review/review', compact('movie'));
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
