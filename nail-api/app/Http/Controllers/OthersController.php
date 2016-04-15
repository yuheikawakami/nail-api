<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OthersController extends Controller
{
    //
    public function getIndex()
    {
      return view('nailist.others.index');
    }

    public function getInfo()
    {
      return view('nailist.others.info');
    }

    public function getService()
    {
      return view('nailist.others.service');
    }

    public function getGuide()
    {
      return view('nailist.others.guide');
    }

}
