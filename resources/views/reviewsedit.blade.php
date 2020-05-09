@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            レビュー登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- トラック登録フォーム -->
        <form action="{{ url('reviews/update') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- ドライバーID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_id" class="col-sm-3 control-label">ドライバーID</label>
                    <input type="text" name="driver_id" class="form-control" value="{{$review->driver_id}}">
                </div>
            </div>
            
            <!-- 待機場所ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="waitingplace_id" class="col-sm-3 control-label">待機場所ID</label>
                    <input type="text" name="waitingplace_id" class="form-control" value="{{$review->waitingplace_id}}">
                </div>
            </div>
            
            <!-- 使用時間ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="time_id" class="col-sm-3 control-label">使用時間ID</label>
                    <input type="text" name="time_id" class="form-control" value="{{$review->time_id}}">
                </div>
            </div>
            
            <!-- レビュー星評価 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="review_star" class="col-sm-3 control-label">レビュー星評価</label>
                    <input type="text" name="review_star" class="form-control" value="{{$review->review_star}}">
                </div>
            </div>
            
            <!-- レビューコメント -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="review_text" class="col-sm-3 control-label">レビューコメント</label>
                    <input type="text" name="review_text" class="form-control" value="{{$review->review_text}}">
                </div>
            </div>
    
<!-- Save ボタン/Back ボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/reviews') }}"> 
            Back
            </a> 
        </div>
        <!--/ Save ボタン/Back ボタン -->
        
        <!-- id 値を送信 -->
        <input type="hidden" name="id" value="{{$review->id}}" /> <!--/ id 値を送信 -->
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        </form>
</div> </div>
@endsection