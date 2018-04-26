<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class relationship extends Model
{
  public $timestamps = false;
  //surrogate key
  protected $primaryKey = 'relationship_id';
    //

    public function relationship_user(){
      return $this->belongsTo('App\User');
    }
    public function relationship_user_profile(){
      return $this->belongsTo('App\User_profile');
    }
}
