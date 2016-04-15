<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = ['user_id','nailist_id','nail_menu',];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
