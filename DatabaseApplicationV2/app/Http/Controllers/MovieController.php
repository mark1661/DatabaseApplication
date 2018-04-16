<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Movie_poster;
use Illuminate\Support\Facades\Input as Input;

class MovieController extends Controller
{
    public function index(){
      $movies= Movie::get();
      return view('movies/index', compact('movies'));
    }

    public function create(){
      return view('movies/create');
    }
// php artisan storage:link
    public function store(){
      $this->validate(request(), [
      'image' => 'required|file'
       ]);
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
      // return redirect('/movies');
    }

    public function show($id){
      $movie= Movie::find($id);
      return view('movies/show', compact('movie'));
    }

    public function edit($id){
      $movie= Movie::find($id);
      $movie->name=request('name');
      $movie->overview=request('overview');
      $movie->poster=request('poster');
      $movie->actor_id=request('actor');
      $movie->clip_id=request('clip');
      $movie->release_date=request('release_date');
      $movie->genre=request('genre');
      $movie->save();
      return redirect('/movies');
    }

    public function delete($id){
      $movie= Movie::find($id);
      $movie->delete();
      return redirect('/movies');
    }

    public function deleteConfirmation($id){
      $movie= Movie::find($id);
      return view('/movies/delete', compact('movie'));
    }
}
