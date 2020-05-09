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

         <!--利用条件登録フォーム -->
        <form action="{{ url('times/store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

             <!--開始日時 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="day1_start" class="col-sm-3 control-label">開始日時</label>
                    <input type="date" name="day1_start" class="form-control">
                </div>
            </div>
            
             <!--終了日時 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="day1_end" class="col-sm-3 control-label">終了日時</label>
                    <input type="date" name="day1_end" class="form-control">
                </div>
            </div>
            
             <!--利用料金 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="day1_fee" class="col-sm-3 control-label">利用料金</label>
                    <input type="text" name="day1_fee" class="form-control">
                </div>
            </div>
            
             <!--待機場所ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="waitingplace_id" class="col-sm-3 control-label">待機場所ID</label>
                    <input type="text" name="waitingplace_id" class="form-control" value="{{$waitingplace->id}}">
                </div>
            </div>

             <!--登録ボタン -->
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

