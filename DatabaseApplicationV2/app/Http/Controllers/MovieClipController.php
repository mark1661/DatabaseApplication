<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie_clip;
use Illuminate\Support\Facades\Storage;

class MovieClipController extends Controller
{
    public function index(){

    }
    //add new clips
    public function store($id){
      if (request()->hasFile('clip')) {
        $movie_clip=new Movie_clip;
        $path=request()->file('clip')->store('public/clips');
        $file_name=request()->file('clip')->hashName();
        $movie_clip->movie_id=$id;
        $movie_clip->user_id=Auth::user()->user_id;
        $movie_clip->path=$path;
        $movie_clip->file_name=$file_name;
        $movie_clip->save();
      }
      return redirect()->route('movie_detail',['id'=>$id]);
    }
    //delete confirmation
    public function show($id){
      $clip=Movie_clip::find($id);
      return view('movieClip/show',compact('clip'));
    }
    //delete
    public function delete($id){
      $clip=Movie_clip::find($id);
      $movie=$clip->movie;
      if ($movie->clip_id!=NULL) {
        $movie->clip_id=NULL;
        $movie->save();
      }
      Storage::delete('public/clips/' . $clip->file_name);
      $clip->delete();
      return redirect()->route('movie_detail',['id'=>$movie->id]);
    }

    public function setToTrailer($id){
      $clip=Movie_clip::find($id);
      $movie=$clip->movie;
      $movie->clip_id=$id;
      $movie->save();
      return redirect()->route('movie_detail',['id'=>$movie->id]);
    }
}
