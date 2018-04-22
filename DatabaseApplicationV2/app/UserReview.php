<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
  protected $primaryKey = 'review_id';

  public function review(){
    return $this->belongsTo('App\User')
  }

  public function review(){
    return $this->belongsTo('App\Movie')
  }
    //
}
