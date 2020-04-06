<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Company;
use Illuminate\Http\Request;


// 会社情報一覧を表示
Route::get('/', function () {
    return view('companies');
});


// 会社情報の登録
Route::post('/companies', function (Request $request) {
 
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
 $companies = new Company;
 $companies->name = $request->name;
 $companies->tel_number = $request->tel_number;
 $companies->email = $request->email;
 $companies->user_flg = 1;
 $companies->holder_flg = 0;
 $companies->save(); //「/」ルートにリダイレクト
 return redirect('/');
});

// 会社情報(name,tel_number,email)を表示
Route::get('/company/{company}?$select=name,tel_number,email', function () {

});

// 〇〇という会社名の会社情報を一式取得し表示
Route::get('/?$filter=startswith(name,)', function () {

});

// 会社情報を更新
Route::patch('/company/{company}', function (Company $company) {
 //
});

// 会社情報を削除
Route::delete('/company/{company}', function (Company $company) {
 //
});