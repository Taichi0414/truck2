<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            会社登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 会社登録フォーム -->
        <form action="{{ url('companies') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 会社名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            
            <!-- 会社電話番号 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="tel_number" class="form-control">
                </div>
            </div>
            
            <!-- 会社メールアドレス -->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            
            <!-- 待機場所利用企業のフラグ -->
            <!--booleanのinputtypeをどうすれば良いか？-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="user_flg" class="form-control">
                </div>
            </div>
            
            <!-- 待機場所提供者のフラグ -->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="holder_flg" class="form-control">
                </div>
            </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Book: 既に登録されてる本のリスト -->

@endsection



#[END]--------------------------------------------