<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Bankaccount;
use Validator;
use Auth;

class BankaccountsController extends Controller
{

//ダッシュボード表示
 public function index($id) {
    $bankaccount = Bankaccount::orderBy('id', 'desc')->first();
    return view('bankaccounts', ['bankaccount' => $bankaccount ],['company' => Company::find($id)]);
    // return $id;
    
    // データだけをJSON形式で返すように記載したもの
    // $bankaccounts = Bankaccount::orderBy('created_at', 'asc')->get(); return $bankaccounts;
    
    // $bankaccounts = Bankaccount::get(); return $bankaccounts;
 }

//登録
 public function store(Request $request) 
 {
    //バリデーション
     $validator = Validator::make($request->all(), [
     'bank_name' => 'required|max:64',
     ]);
     
    //バリデーション：エラー
     if ($validator->fails()) {
     return redirect('/bankaccounts')
     ->withInput()
     ->withErrors($validator);
     }
     
    // Eloquent モデル
     $bankaccount = new Bankaccount;
     $bankaccount->bank_name = $request->bank_name;
     $bankaccount->bank_store = $request->bank_store;
     $bankaccount->bank_kind = $request->bank_kind;
     $bankaccount->bank_account = $request->bank_account;
     $bankaccount->company_id = $request->company_id;
     $bankaccount->save(); //「/」ルートにリダイレクト
     return view('bankaccounts_comfirm', ['bankaccount' => $bankaccount ]);
 }

// 確認
 public function comfirm($id) {
    $bankaccount = Bankaccount::orderBy('id', 'desc')->first();
    return view('bankaccounts_comfirm', ['bankaccount' => $bankaccount ],['company' => Company::find($id)]);
 }
 
//更新画面
 public function edit(Bankaccount $bankaccounts) {
     //{bankaccounts}id 値を取得 => ompany $bankaccounts id 値の1レコード取得
     return view('bankaccountsedit', ['bankaccount' => $bankaccounts]);
 }

//更新
 public function update(Request $request) 
  {
    //バリデーション
     $validator = Validator::make($request->all(), [
     'id'=>'required',
     'bank_name' => 'required|max:64',
     ]);
     
    //バリデーション：エラー
     if ($validator->fails()) {
     return redirect('/bankaccounts')
     ->withInput()
     ->withErrors($validator);
     }
     
    // Eloquent モデル
     $bankaccount = Bankaccount::find($request->id);
     $bankaccount->bank_name = $request->bank_name;
     $bankaccount->bank_store = $request->bank_store;
     $bankaccount->bank_kind = $request->bank_kind;
     $bankaccount->bank_account = $request->bank_account;
     $bankaccount->company_id = $request->company_id;
     $bankaccount->save(); //「/」ルートにリダイレクト
     return view('bankaccounts_comfirm', ['bankaccount' => $bankaccount ]);
  }
  
// 削除
 public function destroy(Bankaccount $Bankaccount) {
 $Bankaccount->delete();//←これをAPI化する
 return redirect('company/'.$Bankaccount->company_id.'/bankaccounts');
 }

}
