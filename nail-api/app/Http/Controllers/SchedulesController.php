<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Reservation;

class SchedulesController extends Controller
{
    //
    public function getIndex()
    {
      $id = Auth::user()->id;
      $schedules = Reservation::where('nailist_id', '=', $id)->get();
      if (empty($schedules)){
        return response()->json(['status' => 'Not Found'], 404);
      } else {
        return response()->json([
          'status' => 'Found',
          'schedules' => $schedules
        ]);
      }
    }
}
