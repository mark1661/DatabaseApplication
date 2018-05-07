<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Movie;
use App\Movie_poster;
use App\UserReview;
use App\User;
use App\MovieAndActor;
use App\Movie_clip;
use App\User_like;

use Illuminate\Support\Facades\Input as Input;

class MovieController extends Controller
{

    public function index()
    {
      $movies = Movie::get();
      return view('movies/index', compact('movies'));
    }

    public function create(){
      return view('movies/create');
    }

// php artisan storage:link
    public function store(){
      // $this->validate(request(), [
      // 'image' => 'required|file'
      //  ]);
      $movie_post=new Movie_poster;
      $movie=new Movie;

      $movie->name=request('name');
      $movie->overview=request('overview');
      $movie->poster=request('poster');
      $movie->clip_id=request('clip');
      $movie->release_date=request('release_date');
      $movie->genre=request('genre');
      $movie->save();
      if (request()->hasFile('image')) {
        $path=request()->file('image')->store('public/images');
        $file_name=request()->file('image')->hashName();
        $movie_post->path=$path;
        $movie_post->file_name=$file_name;
        $movie_post->movie_id=$movie->id;
        $movie_post->save();
        $movie->poster=$movie_post->id;
      }
    $movie->save();
    return redirect('/movies');
    }

    public function detail($id)
    {
      $movie = Movie::find($id);
      $reviews = UserReview::where('movie_id', $id)->get();
      return view('movies/detail', compact('movie'), compact('reviews'));
    }

    public function show($id){
      $movie= Movie::find($id);
      return view('movies/edit', compact('movie'));
    }

    public function edit($id){
      $movie= Movie::find($id);
      if (request('addActors')!=NULL) {
        $actors = request('addActors');
        foreach ($actors as $actor) {
          $newRecord=new MovieAndActor;
          $newRecord->movie_id=$id;
          $newRecord->actor_id=$actor;
          $newRecord->save();
        }
      }
      if (request('deleteActors')!=NULL) {
        $actors = request('deleteActors');
        foreach ($actors as $actor) {
          $deleteRecord=MovieAndActor::where([['actor_id','=',$actor],['movie_id','=',$id]])->first()->delete();
        }
      }
      if (request()->hasFile('image')) {
        $movie_post=new Movie_poster;
        $path=request()->file('image')->store('public/images');
        $file_name=request()->file('image')->hashName();
        $movie_post->path=$path;
        $movie_post->file_name=$file_name;
        $movie_post->movie_id=$id;
        $movie_post->save();
      }
      $movie->name=request('name');
      $movie->overview=request('overview');
      $movie->release_date=request('release_date');
      $movie->genre=request('genre');
      $movie->save();
      return redirect('/movies');
    }
    public function deleteConfirmation($id){
      $movie= Movie::find($id);
      return view('/movies/delete', compact('movie'));
    }

    public function delete($id){
      $movie= Movie::find($id)->first();
      //Find movie poster
      $posters=Movie_poster::where('movie_id', $id)->get();
      foreach($posters as $poster){
        Storage::delete('public/images/' . $poster->file_name);
      }
      //Find movie clips
      $clips=Movie_clip::where('movie_id', $id)->get();
      foreach($clips as $clip){
        Storage::delete('public/clips/' . $clip->file_name);
      }
      //Delete
      $deletedPosters=Movie_poster::where('movie_id',$id)->delete();
      $deletedClips=Movie_clip::where('movie_id',$id)->delete();
      $deletedLikes=User_like::where('movie_id',$id)->delete();
      $deletedReviews=UserReview::where('movie_id',$id)->delete();
      $movie->delete();
      return redirect('/movies');
    }

}
