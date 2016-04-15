<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nail_menu extends Model
{
    //
    protected $fillable = ['user_id','menu',];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
