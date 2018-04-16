<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie_poster extends Model
{
    public function movie(){
      return $this->belongsTo(Movie::class);
    }
}
