<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Waitingplace;
use App\Driver;
use App\Time;
use App\Reservation;
use Validator;
use Auth;

class UserController extends Controller
{
    public function getSignin()
      {
      return view('signin');
      }
     
    public function postSignin(Request $request)
      {
      $this->validate($request,[
      'password' => 'required'
      ]);
     
      if(Auth::attempt(['driver_email' => $request->input('driver_email'), 'password' => $request->input('password')])){
      return view('user_waitingplace',['driver' => Driver::find($id)]);
      }
      return redirect()->back();
      }
}
