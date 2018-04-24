<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class relationship extends Model
{
  public $timestamps = false;
  //surrogate key
  protected $primaryKey = 'relationship_id';
    //
}
