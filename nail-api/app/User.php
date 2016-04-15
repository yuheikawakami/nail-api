<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
      return $this->hasOne('App\Profile');
    }

    public function reservation()
    {
      return $this->hasOne('App\Reservation');
    }

    public function nail_menu()
    {
      return $this->hasMany('App\Nail_menu');
    }

    public function portfolio()
    {
      return $this->hasOne('App\Portfolio');
    }

    public function room()
    {
      return $this->hasMany('App\Room');
    }

    public function point()
    {
      return $this->hasOne('App\Point');
    }

    public function nailist()
    {
      return $this->hasOne('App\Nailist');
    }



}
