<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MovieAndActor;
class MovieAndActorController extends Controller
{
  public function store($id){
    $newRecord=new MovieAndActor;
    $newRecord->movie_id=$id;
    $newRecord->movie_id=$id;
    
  }
}
