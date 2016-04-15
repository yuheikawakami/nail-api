<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nailist extends Model
{
    //
    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
