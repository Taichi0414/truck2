<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Waitingplace;
use App\Time;
use Validator;
use Auth;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // log::debug($waitingplace_id);
        // $waitingplaces = Waitingplace::orderBy('created_at', 'asc')->get();
        // return view('waitingplaces', ['waitingplaces' => $waitingplaces]);
        // $times = Time::where('waitingplace_id', $waitingplace_id)->get();
        $time = Time::orderBy('id', 'desc')->first();
        return view('times', ['time' => $time],['waitingplace' => Waitingplace::find($id)]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
         $validator = Validator::make($request->all(), [
            
         ]);
         
        //バリデーション：エラー
         if ($validator->fails()) {
         return redirect('/times')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $time = new Time;
         $time->day1_start = $request->day1_start;
         $time->day1_end = $request->day1_end;
         $time->day1_fee = $request->day1_fee;
         $time->waitingplace_id = $request->waitingplace_id;
         $time->save(); //「/」ルートにリダイレクト
         return view('times_comfirm', ['time' => $time ]);
    }
    
    // 確認
     public function comfirm($id) {
        $time = Time::orderBy('id', 'desc')->first();
        return view('times', ['time' => $time],['waitingplace' => Waitingplace::find($id)]);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $times)
    {
        return view('timesedit', ['time' => $times]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //バリデーション
         $validator = Validator::make($request->all(), [
         'id'=>'required',
         ]);
         
        //バリデーション：エラー
         if ($validator->fails()) {
         return redirect('/times')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $time = Time::find($request->id);
         $time->day1_start = $request->day1_start;
         $time->day1_end = $request->day1_end;
         $time->day1_fee = $request->day1_fee;
         $time->waitingplace_id = $request->waitingplace_id;
         $time->save(); //「/」ルートにリダイレクト
         return view('times_comfirm', ['time' => $time ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $Time)
    {
        $Time->delete();
        return redirect('waitingplace/'.$Time->waitingplace_id.'/times');
    }
}
