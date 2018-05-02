<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actor;

class ActorController extends Controller
{
    public function index(){
      $actors=Actor::select('id','first_name','last_name')->get();
      foreach ($actors as $actor) {
        echo $actor.' ';
      }
    }
}
