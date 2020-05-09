<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function waitingplace()
      {
      return $this->belongsTo('App\Waitingplace');
      }
}
