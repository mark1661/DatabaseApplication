<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Movie;

class Movie_clip extends Model
{
    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }
    public function movie(){
      return $this->belongsTo(Movie::class);
    }

}
