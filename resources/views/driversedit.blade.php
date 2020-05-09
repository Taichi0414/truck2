@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            ドライバー更新
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- ドライバー登録フォーム -->
        <form action="{{ url('drivers/update') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- ドライバー名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_name" class="col-sm-3 control-label">ドライバー名</label>
                    <input type="text" name="driver_name" class="form-control" value="{{$driver->driver_name}}">
                </div>
            </div>
            
            <!-- ドライバー電話番号 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_telnumber" class="col-sm-3 control-label">ドライバー電話番号</label>
                    <input type="text" name="driver_telnumber" class="form-control" value="{{$driver->driver_telnumber}}">
                </div>
            </div>
            
            <!-- ドライバーメールアドレス -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_email" class="col-sm-3 control-label">ドライバーメールアドレス</label>
                    <input type="text" name="driver_email" class="form-control" value="{{$driver->driver_email}}">
                </div>
            </div>
            
            <!-- 免許証ナンバー -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_license" class="col-sm-3 control-label">免許証ナンバー</label>
                    <input type="text" name="driver_license" class="form-control" value="{{$driver->driver_license}}">
                </div>
            </div>
            
            <!-- パスワード-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="password" class="col-sm-3 control-label">パスワード</label>
                    <input type="text" name="password" class="form-control" value="{{$driver->password}}">
                </div>
            </div>
            
            <!-- カンパニーID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="company_id" class="col-sm-3 control-label">カンパニーID</label>
                    <input type="text" name="company_id" class="form-control" value="{{$driver->company_id}}">
                </div>
            </div>

<!-- Save ボタン/Back ボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/drivers') }}"> 
            Back
            </a> 
        </div>
        <!--/ Save ボタン/Back ボタン -->
        
        <!-- id 値を送信 -->
        <input type="hidden" name="id" value="{{$driver->id}}" /> <!--/ id 値を送信 -->
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        </form>
</div> </div>
@endsection