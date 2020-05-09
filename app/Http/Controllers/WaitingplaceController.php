<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Waitingplace;
use Validator;
use Auth;

class WaitingplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $waitingplace = Waitingplace::orderBy('id', 'desc')->first();
        return view('waitingplaces', ['waitingplace' => $waitingplace],['company' => Company::find($id)]);
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
         return redirect('/waitingplaces')
         ->withInput()
         ->withErrors($validator);
         }
         
        //file 取得
        $file = $request->file('img'); 
        //file が空かチェック
        if( !empty($file) ){
            //ファイル名を取得
            $filename = $file->getClientOriginalName();
            //ファイル名を取得
            $move = $file->move('./upload/',$filename);
        }else{
            $filename = "";
        }
        
        // Eloquent モデル
         $waitingplace = new Waitingplace;
         $waitingplace->place = $request->place;
         $waitingplace->address_prefecture = $request->address_prefecture;
         $waitingplace->address_municipality = $request->address_municipality;
         $waitingplace->address_number = $request->address_number;
         $waitingplace->track_size_wide = $request->track_size_wide;
         $waitingplace->track_size_depth = $request->track_size_depth;
         $waitingplace->track_size_height = $request->track_size_height;
         $waitingplace->track_weight = $request->track_weight;
         $waitingplace->img = $filename;
         $waitingplace->notes = $request->notes;
         $waitingplace->company_id = $request->company_id;
         $waitingplace->save(); //「/」ルートにリダイレクト
         return view('waitingplaces_comfirm', ['waitingplace' => $waitingplace ]);
    }
    
    // 確認
     public function comfirm($id) {
        $waitingplace = Waitingplace::orderBy('id', 'desc')->first();
        return view('waitingplaces_comfirm', ['waitingplace' => $waitingplace],['company' => Company::find($id)]);
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
    public function edit(Waitingplace $waitingplaces)
    {
        return view('waitingplacesedit', ['waitingplace' => $waitingplaces]);
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
         return redirect('/waitingplaces')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $waitingplace = Waitingplace::find($request->id);
         $waitingplace->place = $request->place;
         $waitingplace->address_prefecture = $request->address_prefecture;
         $waitingplace->address_municipality = $request->address_municipality;
         $waitingplace->address_number = $request->address_number;
         $waitingplace->track_size_wide = $request->track_size_wide;
         $waitingplace->track_size_depth = $request->track_size_depth;
         $waitingplace->track_size_height = $request->track_size_height;
         $waitingplace->track_weight = $request->track_weight;
         $waitingplace->img = $request->img;
         $waitingplace->notes = $request->notes;
         $waitingplace->company_id = $request->company_id;
         $waitingplace->save(); //「/」ルートにリダイレクト
         return view('waitingplaces_comfirm', ['waitingplace' => $waitingplace ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waitingplace $Waitingplace)
    {
        $Waitingplace->delete();//←これをAPI化する
        return redirect('company/'.$Waitingplace->company_id.'/waitingplaces');
    }
}
