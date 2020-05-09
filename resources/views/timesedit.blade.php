@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            利用条件登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- トラック登録フォーム -->
        <form action="{{ url('times/update') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 開始日時 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="day1_start" class="col-sm-3 control-label">開始日時</label>
                    <input type="date" name="day1_start" class="form-control" value="{{$time->day1_start}}">
                </div>
            </div>
            
            <!-- 終了日時 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="day1_end" class="col-sm-3 control-label">終了日時</label>
                    <input type="date" name="day1_end" class="form-control" value="{{$time->day1_end}}">
                </div>
            </div>
            
            <!-- 利用料金 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="day1_fee" class="col-sm-3 control-label">利用料金</label>
                    <input type="text" name="day1_fee" class="form-control" value="{{$time->day1_fee}}">
                </div>
            </div>
            
            <!-- 待機場所ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="waitingplace_id" class="col-sm-3 control-label">待機場所ID</label>
                    <input type="text" name="waitingplace_id" class="form-control" value="{{$time->waitingplace_id}}">
                </div>
            </div>

 <!-- Save ボタン/Back ボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/times') }}"> 
            Back
            </a> 
        </div>
        <!--/ Save ボタン/Back ボタン -->
        
        <!-- id 値を送信 -->
        <input type="hidden" name="id" value="{{$time->id}}" /> <!--/ id 値を送信 -->
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        </form>
</div> </div>
@endsection