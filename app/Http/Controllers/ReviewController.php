<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use Validator;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'asc')->get();
        return view('reviews', ['reviews' => $reviews]);
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
             'review_star' => 'required|max:2',
         ]);
         
        //バリデーション：エラー
         if ($validator->fails()) {
         return redirect('/reviews')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $reviews = new Review;
         $reviews->driver_id = $request->driver_id;
         $reviews->waitingplace_id = $request->waitingplace_id;
         $reviews->time_id = $request->time_id;
         $reviews->review_star = $request->review_star;
         $reviews->review_text = $request->review_text;
         $reviews->save(); //「/」ルートにリダイレクト
         return redirect('/reviews');
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
    public function edit(Review $reviews)
    {
        return view('reviewsedit', ['review' => $reviews]);
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
         return redirect('/reviews')
         ->withInput()
         ->withErrors($validator);
         }
         
        // Eloquent モデル
         $reviews = Review::find($request->id);
         $reviews->driver_id = $request->driver_id;
         $reviews->waitingplace_id = $request->waitingplace_id;
         $reviews->time_id = $request->time_id;
         $reviews->review_star = $request->review_star;
         $reviews->review_text = $request->review_text;
         $reviews->save(); //「/」ルートにリダイレクト
         return redirect('/reviews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $Review)
    {
        $Review->delete();//←これをAPI化する
        return redirect('/reviews');
    }
}
