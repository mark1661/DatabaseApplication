<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actor;
use App\Movie;

class MovieAndActor extends Model
{
    public function actors(){
      $this->hasMany(Actor::class);
    }
    public function movies(){
      $this->hasMany(Movie::class);
    }
}
