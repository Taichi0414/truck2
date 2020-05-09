<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;

use App\Company;
use App\Waitingplace;
use App\Driver;
use App\Time;
use App\Reservation;
use Validator;
use Auth;

class ReservationController extends Controller
{
    public function index($id)
    {
        $waitingplaces = Waitingplace::orderBy('created_at', 'asc')->get();
        return view('user_waitingplace', ['waitingplaces' => $waitingplaces],['driver' => Driver::find($id)]);
    }
    
    public function search(Request $request,$id)
    {
        #キーワード受け取り
          $keyword = $request->input('keyword');
         
          #クエリ生成
          $query = Waitingplace::query();
         
          #もしキーワードがあったら
          if(!empty($keyword))
          {
            $query->where('place','like','%'.$keyword.'%')->orWhere('address_prefecture','like','%'.$keyword.'%')->orWhere('address_municipality','like','%'.$keyword.'%');
          }
         
          #ページネーション
          $waitingplaces = $query->orderBy('created_at','desc')->paginate(10);
          return view('user_waitingplace',['waitingplaces' => $waitingplaces],['driver' => Driver::find($id)]);
    }
    
    public function create($driverId,$waitingplaceID) {
        $waitingplaces = Waitingplace::get();
        // $reservations = Reservation::orderBy('created_at', 'asc')->get();
        return view('reservation',['driver' => Driver::find($driverId)],['waitingplace' => Waitingplace::find($waitingplaceID)]);
        // $company = Company::find($company_id); return $company;
        // ,['reservations' => $reservations]
    }
    
    // public function find($waitingplace_id) {
    // // データだけをJSON形式で返すように記載したもの
    // // $id =1;
    // $company = Company::find($company_id); return $company;
    // }

    public function store(ReservationRequest $request) {

        \App\Reservation::create([
            'driver_id' => $request->driver_id,
            'waitingplace_id' => $request->waitingplace_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'fee' => $request->fee
        ]);
        // 予約一覧を現在時刻をキーに終了時刻を過ぎたものは予約一覧から外し、利用結果一覧の方へ移行
        // レビューは待機場所にひもつけて結果を出す
        // アプリのトップ画面は予約一覧＋新規予約を出す。
        // 今の予約がある場合、予約一覧が出る。
        // 今の予約がなかったら、過去の履歴がでて、レビューがなければレビュー入力を出す。
        // 最後のレビューがなかった際にはレビュー入力画面が出るようにする。
        return back()->with('result', '予約が完了しました。');
    }
    
    public function comfirm($id) {
        $reservations = Reservation::orderBy('created_at', 'asc')->get();
        return view('reservation_comfirm',['reservations' => $reservations],['driver' => Driver::find($id)],['waitingplace' => Waitingplace::find($id)]);
    }
    
     public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect('driver/'.$reservation->driver_id.'/reservation_comfirm');
    }
    
}
