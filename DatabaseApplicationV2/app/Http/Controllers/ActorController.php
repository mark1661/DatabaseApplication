<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actor;
use App\MovieAndActor;

class ActorController extends Controller
{
    public function create()
    {
      return view('actor/create');
    }

    public function index()
    {
      $actors = Actor::get();
      return view('actor/index', compact('actors'));
    }

    public function view($id)
    {
      $actor = Actor::find($id);
      return view('actor/details', compact('actor'));
    }

    public static function getActorName($movieId)
    {
      $actorName = "";
      $movies = MovieAndActor::where('movie_id', $movieId)->get();
      for($counter = 0; $counter < count($movies); $counter++)
      {
        $actorArray = Actor::where('id', $movies[$counter]->actor_id)->get();
        $actorName .= ' ' .$actorArray[0]->first_name . ' ' . $actorArray[0]->last_name;

        if($counter != count($movies) - 1)
        {
          $actorName .= ',';
        }
      }
      return $actorName;
    }

    public function store(Request $request)
    {
      $actor = new Actor;
      $actor->first_name = $request->input('first_name');
      $actor->last_name = $request->input('last_name');
      $actor->save();
      return redirect('/actor/index');
    }

    public function edit($id)
    {
      $actor = Actor::find($id);
      return view('actor/edit', compact('actor'));
    }

    public function update($id)
    {
      $actor = Actor::find($id);
      $actor->first_name = request('first_name');
      $actor->last_name = request('last_name');
      $actor->save();
      return redirect('/actor/index');
    }

    public function delete($id)
    {
      $actor = Actor::find($id);
      return view('actor/delete', compact('actor'));
    }

    public function remove($id)
    {
      $actor = Actor::find($id);
      $actorInMovie = MovieAndActor::where('actor_id', $id)->first();
      $actorInMovie->delete();
      $actor->delete();
      return redirect('/actor/index');
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
