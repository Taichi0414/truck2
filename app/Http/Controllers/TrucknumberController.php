<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use App\Trucknumber;
use Validator;
use Auth;

class TrucknumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $trucknumber = Trucknumber::orderBy('id', 'desc')->first();
        return view('trucknumbers', ['trucknumber' => $trucknumber],['driver' => Driver::find($id)]);
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
             'numberplate_number' => 'required|max:4',
         ]);
         
        //バリデーション：エラー
         if ($validator->fails()) {
         return redirect('/trucknumbers')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $trucknumber = new Trucknumber;
         $trucknumber->numberplate_area = $request->numberplate_area;
         $trucknumber->numberplate_kind = $request->numberplate_kind;
         $trucknumber->numberplate_use = $request->numberplate_use;
         $trucknumber->numberplate_number = $request->numberplate_number;
         $trucknumber->truck_kind = $request->truck_kind;
         $trucknumber->driver_id = $request->driver_id;
         $trucknumber->save(); //「/」ルートにリダイレクト
         return view('trucknumbers_comfirm', ['trucknumber' => $trucknumber ]);
    }

    // 確認
     public function comfirm($id) {
         $trucknumber = Trucknumber::orderBy('id', 'desc')->first();
        return view('trucknumbers_comfirm', ['trucknumber' => $trucknumber],['driver' => Driver::find($id)]);
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
    public function edit(Trucknumber $trucknumbers)
    {
        return view('trucknumbersedit', ['trucknumber' => $trucknumbers]);
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
         return redirect('/trucknumbers')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $trucknumber = Trucknumber::find($request->id);
         $trucknumber->numberplate_area = $request->numberplate_area;
         $trucknumber->numberplate_kind = $request->numberplate_kind;
         $trucknumber->numberplate_use = $request->numberplate_use;
         $trucknumber->numberplate_number = $request->numberplate_number;
         $trucknumber->truck_kind = $request->truck_kind;
         $trucknumber->driver_id = $request->driver_id;
         $trucknumber->save(); //「/」ルートにリダイレクト
         return view('trucknumbers_comfirm', ['trucknumber' => $trucknumber ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trucknumber $Trucknumber)
    {
        $Trucknumber->delete();//←これをAPI化する
        return redirect('driver/'.$Trucknumber->driver_id.'/trucknumbers');
    }
}
