<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie_poster;
use Illuminate\Support\Facades\Storage;

class MoviePosterController extends Controller
{
  public function delete($id){
    $poster=Movie_poster::find($id);
    $movie=$poster->movie;
    if ($movie->poster!=NULL) {
      $movie->poster=NULL;
      $movie->save();
    }
    Storage::delete('public/images/' . $poster->file_name);
    $poster->delete();
    return redirect()->route('movie_detail',['id'=>$movie->id]);
  }

  public function setToPoster($id){
    $the_poster=Movie_poster::find($id);
    $movie=$the_poster->movie;
    $movie->poster=$id;
    $movie->save();
    return redirect()->route('movie_detail',['id'=>$movie->id]);
  }
}
