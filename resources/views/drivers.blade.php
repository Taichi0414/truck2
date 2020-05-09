@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            ドライバー登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- ドライバー登録フォーム -->
        <form action="{{ url('drivers/store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- ドライバー名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_name" class="col-sm-3 control-label">ドライバー名</label>
                    <input type="text" name="driver_name" class="form-control">
                </div>
            </div>
            
            <!-- ドライバー電話番号 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_telnumber" class="col-sm-3 control-label">ドライバー電話番号</label>
                    <input type="text" name="driver_telnumber" class="form-control">
                </div>
            </div>
            
            <!-- ドライバーメールアドレス -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_email" class="col-sm-3 control-label">ドライバーメールアドレス</label>
                    <input type="text" name="driver_email" class="form-control">
                </div>
            </div>
            
            <!-- 免許証ナンバー -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_license" class="col-sm-3 control-label">免許証ナンバー</label>
                    <input type="text" name="driver_license" class="form-control">
                </div>
            </div>
            
            <!-- パスワード-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="password" class="col-sm-3 control-label">パスワード</label>
                    <input type="text" name="password" class="form-control">
                </div>
            </div>
            
            <!-- 会社ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="company_id" class="col-sm-3 control-label">会社ID</label>
                    <input type="text" name="company_id" class="form-control" value="{{$company->id}}">
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
