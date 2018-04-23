<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'review_id';

  public function reviewUser(){
    return $this->belongsTo('App\User');
  }

  public function reviewMovie(){
    return $this->belongsTo('App\Movie');
  }
    //
}
