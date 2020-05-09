<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Company;
use Validator;
use Auth;

class CompaniesController extends Controller
{

//会社ダッシュボード表示
 public function index() {
    // 17行目をweb_controllerから呼び出してデータのみを取ってくるようにする
    // $companies = Company::orderBy('created_at', 'asc')->get();
    $company = Company::orderBy('id', 'desc')->first();
    return view('companies', ['company' => $company ]);
    // $request = Request::create('/api/companies/', 'GET');
    // $items = json_decode(Route::dispatch($request)->getContent());
    // return view('companies', ['companies' => $items ]);
    // データだけをJSON形式で返すように記載したもの
    // $companies = Company::orderBy('created_at', 'asc')->get(); return $companies;
    
    // $companies = Company::get(); return $companies;
 }
 
//会社id=1に基づく会社情報を取得
// 今後、idに変数を渡せるようにする必要あり
 public function find($company_id) {
    // データだけをJSON形式で返すように記載したもの
    // $id =1;
    $company = Company::find($company_id); return $company;
 }
 
// 鴻池運輸という会社名の会社情報を一式取得
// 今後、会社名に変数を渡せるようにする必要あり
  public function where() {
    // データだけをJSON形式で返すように記載したもの
    $name ='鴻池運輸';
    $companies = Company::where('name',$name); return $companies;
 }

//登録
 public function store(Request $request) 
 {
    //バリデーション
     $validator = Validator::make($request->all(), [
     'name' => 'required|max:64',
     'tel_number' => 'required|max:12',
     ]);
     
    //バリデーション：エラー
     if ($validator->fails()) {
     return redirect('/')
     ->withInput()
     ->withErrors($validator);
     }
     
    // Eloquent モデル
     // $post = api('api.companies.store', 'POST');
     // $request = Request::create('/api/companies', 'POST');
     // $response = Route::dispatch($request);
     // $instance = json_decode(Route::dispatch($request)->getContent());
     $company = new Company;
     $company->id = $request->id;
     $company->name = $request->name;
     $company->tel_number = $request->tel_number;
     $company->email = $request->email;
     $company->user_flg = $request->user_flg;
     $company->holder_flg = $request->holder_flg;
     $company->save(); //「/」ルートにリダイレクト
     // $request->session()->put('name', $request->input('name'));
     // $request->session()->put('id', $request->input('id'));
     // $request->session()->put('id', $request->all);
     // $request->session()->put('id',$request->id);
     // $id   = $request->session()->get('id');
     return view('companies_comfirm', ['company' => $company ]);
 }
 
 // 確認
 public function comfirm() {
    $company = Company::orderBy('id', 'desc')->first();
    return view('companies_comfirm', ['company' => $company ]);
 }
 
//更新画面
 public function edit(Company $companies) {
     //{companies}id 値を取得 => ompany $companies id 値の1レコード取得
     return view('companiesedit', ['company' => $companies]);
 }

//更新
 public function update(Request $request) 
  {
    //バリデーション
     $validator = Validator::make($request->all(), [
     'id'=>'required',
     'name' => 'required|max:64',
     'tel_number' => 'required|max:12',
     ]);
     
    //バリデーション：エラー
     if ($validator->fails()) {
     return redirect('/')
     ->withInput()
     ->withErrors($validator);
     }
     
    // Eloquent モデル
     $company = Company::find($request->id);
     $company->name = $request->name;
     $company->tel_number = $request->tel_number;
     $company->email = $request->email;
     $company->user_flg = $request->user_flg;
     $company->holder_flg = $request->holder_flg;
     $company->save(); 
     
     //「/」ルートにリダイレクト
     return view('companies_comfirm', ['company' => $company ]);
  }
  
// 会社情報を削除
 public function destroy(Company $company) {
 $company->delete();//←これをAPI化する
 return redirect('/');
 }

}
