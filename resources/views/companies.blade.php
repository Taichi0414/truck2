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
        
         <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">

        <!-- 会社登録フォーム -->
        <form action="{{ url('companies') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 会社名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="name" class="col-sm-3 control-label red">会社名</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            
            <!-- 会社電話番号 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="tel_number" class="col-sm-3 control-label red">会社電話番号</label>
                    <input type="text" name="tel_number" class="form-control">
                </div>
            </div>
            
            <!-- 会社メールアドレス -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="email" class="col-sm-3 control-label red">会社メールアドレス</label>
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            
            <!-- 待機場所利用企業のフラグ -->
            <!--booleanのinputtypeをどうすれば良いか？-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="user_flg" class="col-sm-3 control-label red">待機場所利用者フラグ</label><br>
                    <label for="holder_flg" class="red">※待機場所利用者の場合は1を、そうでない場合は0を入力</label>
                    <input type="text" name="user_flg" class="form-control">
                </div>
            </div>
            
            <!-- 待機場所提供者のフラグ -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="holder_flg" class="col-sm-3 control-label red">待機場所提供者フラグ</label><br>
                    <label for="holder_flg" class="red">※待機場所提供者の場合は1を、そうでない場合は0を入力</label>
                    <input type="text" name="holder_flg" class="form-control">
                </div>
            </div>

            <!-- 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    
    


@endsection



