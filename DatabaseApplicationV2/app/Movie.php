<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie_poster;
class Movie extends Model
{
    public function poster(){
      return $this->hasOne(Movie_poster::class);
    }
}
