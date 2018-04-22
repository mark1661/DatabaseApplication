<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie_poster;
use App\Movie_clip;

class Movie extends Model
{
    public function movie_poster(){
      return $this->hasOne(Movie_poster::class);
    }
    public function movie_posters(){
      return $this->hasMany(Movie_poster::class);
    }
    
    public function movie_clip(){
      return $this->hasOne(Movie_clip::class);
    }
    public function movie_clips(){
      return $this->hasMany(Movie_clip::class);
    }
}
