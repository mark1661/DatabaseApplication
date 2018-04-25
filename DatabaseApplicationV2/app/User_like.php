<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Movie;

class User_like extends Model
{
    public function users(){
      return $this->belongsTo(User::class);
    }
    public function movies(){
      return $this->belongsTo(Moivie::class);
    }
}
