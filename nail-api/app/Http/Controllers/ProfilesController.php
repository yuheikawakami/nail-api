<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Nail_menu;
use Validator;

class ProfilesController extends Controller
{
    //
    public function getIndex()
    {
      $currentUser = Auth::user()->profile;
      if (empty($currentUser)){
        return response()->json(['status' => 'Not Found'], 404);
      } else {
      return response()->json([
        'status' => 'Found',
        'profile' => $currentUser
      ]);
     }
    }

    public function getNailmenus()
    {
      $nailmenus = Auth::user()->nail_menu;
      if (empty($nailmenus)){
        return response()->json(['status' => 'Not Found'], 404);
      } else {
        return response()->json([
          'status' => 'Found',
          'nailmenus' => $nailmenus
        ]);
      }
    }

    public function postNailmenus(Request $request)
    {
      $nailmenu = new Nail_menu();
      $nailmenu->user_id = Auth::user()->id;
      $nailmenu->menu = $request->menu;

      $validator = Validator::make($request->all(), [
         'menu' => 'required'
       ]);

       if (!$validator->fails()){
       $nailmenu->save();
       $response = response()->json([
         'status' => 'OK',
         'nailmenu' => $nailmenu
       ]);
     } else {
       $message = $validator->messages();
       $response = response()->json([
         'status' => 'ERROR',
         'message' => $message
       ], 409);
    }
    return $response;
  }

    public function deleteNailmenus($id)
    {
      $nailmenu = Nail_menu::findOrFail($id);
      $nailmenu->delete();
      if ($nailmenu){
        $response = response()->json([
          'status' => 'OK'
        ]);
      } else {
        $response = response()->json([
          'status' => 'NG'
        ], 404);
      }
      return $response;
    }

    public function putNailmenus(Request $request, $id)
    {
      $nailmenu = Nail_menu::findOrFail($id);
      $nailmenu->menu = $request->menu;

      $validator = Validator::make($request->all(), [
         'menu' => 'required'
       ]);

       if (!$validator->fails()){
         $nailmenu->save();
         $response = response()->json([
           'status' => 'OK',
           'nailmenu' => $nailmenu
         ], 201);
       } else {
         $message = $validator->message();
         $response = response()->json([
           'status' => 'ERROR',
           'message' => $message
         ], 409);
       }

    }


    public function putSettings(Request $request)
    {
      $settings = Auth::user()->profile;
      $settings->address = $request->address;
      $settings->access = $request->access;
      $settings->business_hours = $request->business_hours;
      $settings->introduction = $request->introduction;

      $validator = Validator::make($request->all(), [
        'address' => 'required or old(address)',
        'access' => 'required',
        'business_hours' => 'required',
        'introduction' => 'required',
      ]);

      if (!$validator->fails()){
        $settings->save();
        $response = response()->json([
          'status' => 'OK',
          'settings' => $settings
        ], 201);
      } else {
        $message = $validator->message();
        $response = response()->json([
          'status' => 'ERROR',
          'message' => $message
        ], 409);
      }
    }
}
