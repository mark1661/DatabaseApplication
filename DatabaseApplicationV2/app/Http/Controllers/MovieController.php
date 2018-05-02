<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Movie;
use App\Movie_poster;
use App\UserReview;
use App\User;
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
      $movie->actor_id=request('actor');
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
      $movie->actor_id=request('actor');
      $movie->clip_id=request('clip');
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
      $movie= Movie::find($id);
      $posters=Movie_poster::where('movie_id', $id)->get();
      foreach($posters as $poster){
        Storage::delete('public/images/' . $poster->file_name);
      }
      $deletedPosters=Movie_poster::where('movie_id',$id)->delete();
      $movie->delete();
      return redirect('/movies');
    }

}
