<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $eggs = Auth::user()->id;
      return view('users.index')->with('eggs', $eggs);
    }

    public function map()
    {
      return view('users.map');
    }

    public function getReservationsList()
    {
      return view('users.reservations_list');
    }

    public function getMypage()
    {
      return view('users.mypage');
    }


}
