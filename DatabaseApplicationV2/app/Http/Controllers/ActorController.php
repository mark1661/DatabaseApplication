<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actor;
use App\MovieAndActor;

class ActorController extends Controller
{
    public function store(){
      
    }
    public function delete($id){

    }
    public function showActorsToAdd(){
      $addedActors=MovieAndActor::select('actor_id')->where('movie_id',$_GET['movie_id'])->get();
      $temp=array();
      foreach ($addedActors as $addedActor) {
        array_push($temp, $addedActor->actor_id);
      }
      $actors=Actor::select('id','first_name','last_name')->whereNotIn('id',$temp)->get();
      foreach ($actors as $actor) {
        echo $actor.' ';
      }
    }
    public function showActorsToDelete(){
      $addedActors=MovieAndActor::select('actor_id')->where('movie_id',$_GET['movie_id'])->get();
      $temp=array();
      foreach ($addedActors as $addedActor) {
        array_push($temp, $addedActor->actor_id);
      }
      $actors=Actor::select('id','first_name','last_name')->whereIn('id',$temp)->get();
      foreach ($actors as $actor) {
        echo $actor.' ';
      }
    }
}
