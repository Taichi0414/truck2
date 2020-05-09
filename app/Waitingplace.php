<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waitingplace extends Model
{
    //hasMany設定
  public function time()
  {
  return $this->hasOne('App\Time');
  }
}
