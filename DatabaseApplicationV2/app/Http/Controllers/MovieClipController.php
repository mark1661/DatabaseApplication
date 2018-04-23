<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie_clip;

class MovieClipController extends Controller
{
    public function index(){

    }

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
      return redirect('/movies');
    }

    public function delete(){
      
      return redirect('/movies');
    }
}
