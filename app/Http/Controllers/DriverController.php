<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Driver;
use Validator;
use Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $driver = Driver::orderBy('id', 'desc')->first();
        return view('drivers', ['driver' => $driver],['company' => Company::find($id)]);
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
         return redirect('/drivers')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $driver = new Driver;
         $driver->driver_name = $request->driver_name;
         $driver->driver_telnumber = $request->driver_telnumber;
         $driver->driver_email = $request->driver_email;
         $driver->driver_license = $request->driver_license;
         $driver->password = $request->password;
         $driver->company_id = $request->company_id;
         $driver->save(); //「/」ルートにリダイレクト
         return view('drivers_comfirm', ['driver' => $driver ]);
    }
    
     // 確認
     public function comfirm($id) {
        $driver = Driver::orderBy('id', 'desc')->first();
        return view('drivers_comfirm', ['driver' => $driver],['company' => Company::find($id)]);
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
    public function edit(Driver $drivers)
    {
        return view('driversedit', ['driver' => $drivers]);
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
         return redirect('/drivers')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $driver = Driver::find($request->id);
         $driver->driver_name = $request->driver_name;
         $driver->driver_telnumber = $request->driver_telnumber;
         $driver->driver_email = $request->driver_email;
         $driver->driver_license = $request->driver_license;
         $driver->password = $request->password;
         $driver->company_id = $request->company_id;
         $driver->save(); //「/」ルートにリダイレクト
         return view('drivers_comfirm', ['driver' => $driver ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $Driver)
    {
        $Driver->delete();//←これをAPI化する
        return redirect('company/'.$Driver->company_id.'/drivers');
    }
}
