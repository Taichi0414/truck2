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
use App\Waitingplace;
use App\Time;
use Illuminate\Http\Request;

// 会社ルート
    // 会社情報一覧を表示
    Route::get('/', 'CompaniesController@index');
    // return view('companies', ['companies' => $companies ]);
    
    // 会社情報の登録
    Route::post('/companies', 'CompaniesController@store');
    
    // 会社情報の確認
    Route::post('/companies_comfirm', 'CompaniesController@comfirm');
    // // 会社idを指定して会社情報を取得
    // // 後ほど検索画面を作り、検索idを変数として渡せるようにする必要あり
    // Route::get('/companies/{company_id}', 'CompaniesController@find');
    
    // // Route::get('/abc/company/{company}', 'CompaniesController@find');
    
    // // 〇〇という会社名の会社情報を一式取得
    // // 後ほど検索画面を作り、検索会社名を変数として渡せるようにする必要あり
    // Route::get('/companies?$filter=startswith(name)', 'CompaniesController@where');
    
    // 会社情報の更新画面
    Route::post('/companiesedit/{companies}', 'CompaniesController@edit');
    
    // 会社情報の更新
    Route::post('/companies/update', 'CompaniesController@update');
    
    // 会社情報を削除
    Route::delete('/company/{company}', 'CompaniesController@destroy');

// 銀行口座ルート
    // 銀行口座情報一覧を表示
    Route::get('company/{id}/bankaccounts', 'BankaccountsController@index');
    
    // 銀行口座情報の登録
    Route::post('bankaccounts/store', 'BankaccountsController@store');
    
    // 口座情報の確認
    Route::post('/bankaccounts_comfirm', 'BankaccountsController@comfirm');
    
    // 銀行口座情報の更新画面
    Route::post('bankaccountsedit/{bankaccounts}', 'BankaccountsController@edit');
    
    // 銀行口座情報の更新
    Route::post('bankaccounts/update', 'BankaccountsController@update');
    
    // 銀行口座情報を削除
    Route::delete('bankaccount/{bankaccount}', 'BankaccountsController@destroy');

// ドライバールート
    // 一覧を表示
    Route::get('company/{id}/drivers', 'DriverController@index');
    
    // 登録
    Route::post('/drivers/store', 'DriverController@store');
    
    // 情報の確認
    Route::post('/drivers_comfirm', 'DriverController@comfirm');
    
    // 更新画面
    Route::post('/driversedit/{drivers}', 'DriverController@edit');
    
    // 更新
    Route::post('/drivers/update', 'DriverController@update');
    
    // 削除
    Route::delete('/driver/{driver}', 'DriverController@destroy');

// トラックナンバールート
    // 一覧を表示
    Route::get('driver/{id}/trucknumbers', 'TrucknumberController@index');
    // return view('companies', ['companies' => $companies ]);
    
    // 登録
    Route::post('/trucknumbers/store', 'TrucknumberController@store');
    
    // 情報の確認
    Route::post('/trucknumbers_comfirm', 'TrucknumberController@comfirm');
    
    // 更新画面
    Route::post('/trucknumbersedit/{trucknumbers}', 'TrucknumberController@edit');
    
    // 更新
    Route::post('/trucknumbers/update', 'TrucknumberController@update');
    
    // 削除
    Route::delete('/trucknumber/{trucknumber}', 'TrucknumberController@destroy');

// // レビュールート
//     // 一覧を表示
//     Route::get('/reviews', 'ReviewController@index');
//     // return view('companies', ['companies' => $companies ]);
    
//     // 登録
//     Route::post('/reviews/store', 'ReviewController@store');
    
//     // 情報の確認
//     Route::post('/reviews_comfirm', 'ReviewrController@comfirm');
    
//     // 更新画面
//     Route::post('/reviewsedit/{reviews}', 'ReviewController@edit');
    
//     // 更新
//     Route::post('/reviews/update', 'ReviewController@update');
    
//     // 削除
//     Route::delete('/review/{review}', 'ReviewController@destroy');

// 待機場所ルート
    // 一覧を表示
    Route::get('company/{id}/waitingplaces', 'WaitingplaceController@index');
    
    // 登録
    Route::post('/waitingplaces/store', 'WaitingplaceController@store');
    
    // 情報の確認
    Route::post('/waitingplaces_comfirm', 'WaitingplaceController@comfirm');
    
    // 更新画面
    Route::post('/waitingplacesedit/{waitingplaces}', 'WaitingplaceController@edit');
    
    // 更新
    Route::post('/waitingplaces/update', 'WaitingplaceController@update');
    
    // 削除
    Route::delete('/waitingplace/{waitingplace}', 'WaitingplaceController@destroy');

// 利用条件ルート
    // 一覧を表示
    Route::get('/waitingplace/{id}/times', 'TimeController@index');
    
    // 登録
    Route::post('/times/store', 'TimeController@store');
    
    // 情報の確認
    Route::post('/times_comfirm', 'TimeController@comfirm');
    
    // 更新画面
    Route::post('/timesedit/{times}', 'TimeController@edit');
    
    // 更新
    Route::post('/times/update', 'TimeController@update');
    
    // 削除
    Route::delete('/time/{time}', 'TimeController@destroy');


// // ログイン
//     Route::get('/signin','UserController@getSignin');
//     Route::post('/signin','UserController@postSignin');
    
// トラックドライバー待機場予約ルーティング
    // 待機場所一覧画面
    Route::get('driver/{id}/user_waitingplaces','ReservationController@index');
    // 検索フォーム
    Route::get('driver/{id}/user_waitingplaces/search','ReservationController@search');
    // 予約時間入力フォーム
    Route::get('driver/{driver}/waitingplace/{waitingplace}/reservation', 'ReservationController@create'); 
    // 送信先
    Route::post('driver/{driver}/waitingplace/{waitingplace}/reservation_make', 'ReservationController@store'); 
    // 予約一覧
    Route::get('driver/{id}/reservation_comfirm', 'ReservationController@comfirm'); 
    // 削除
    Route::delete('/reservation/{reservation}', 'ReservationController@destroy');

// 待機場所保有者・ログイン前ルーティング
    // 待機場所一覧画面
    Route::get('/waitingplace/{id}/watcher_waitingplaces', function () {
        $waitingplaces = Waitingplace::orderBy('created_at', 'asc')->get();
        return view('watcher_waitingplace', ['waitingplaces' => $waitingplaces]);
    });
    
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
