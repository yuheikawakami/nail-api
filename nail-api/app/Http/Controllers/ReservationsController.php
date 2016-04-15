<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Reservation;
use Validator;

class ReservationsController extends Controller
{
    public function getIndex()
    {

      return view('users.reservation');
    }

    public function postIndex(Request $request)
    {
      $reservations = new Reservation();
      $reservations->user_id = Auth::user()->id;
      $reservations->nailist_id = $request->nailist_id;
      $reservations->nail_menu = $request->nail_menu;

      $validator = Validator::make($request->all(), [
        'nailist_id' => 'required',
        'nail_menu' => 'required'
       ]);

       if (!$validator->fails()){
         $reservations->save();
         $response = response()->json([
           'status' => 'OK',
           'reservations' => $reservations
         ], 201);
       } else {
         $message = $validator->messages();
         $response = response()->json([
           'status' => 'ERROR',
           'message' => $message
         ], 409);
       }
      return $response;
    }

    public function getList()
    {
      $id = Auth::user()->id;
      $reservations = Reservation::where('user_id', '=', $id)->get();

      if (empty($reservations)){
        return response()->json(['status' => 'Not Found'], 404);
      } else {
        return response()->json([
          'status' => 'Found',
          'reservations' => $reservations
        ]);
      }
    }

}
