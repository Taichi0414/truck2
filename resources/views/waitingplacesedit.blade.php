@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            待機場所登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- トラック登録フォーム -->
        <form action="{{ url('waitingplaces/update') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 待機場所名称 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="place" class="col-sm-3 control-label">待機場所名称</label>
                    <input type="text" name="place" class="form-control" value="{{$waitingplace->place}}">
                </div>
            </div>
            
            <!-- 都道府県 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="address_prefecture" class="col-sm-3 control-label">都道府県</label>
                    <input type="text" name="address_prefecture" class="form-control" value="{{$waitingplace->address_prefecture}}">
                </div>
            </div>
            
            <!-- 市区町村 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="address_municipality" class="col-sm-3 control-label">市区町村</label>
                    <input type="text" name="address_municipality" class="form-control" value="{{$waitingplace->address_municipality}}">
                </div>
            </div>
            
            <!-- 番地以下 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="address_number" class="col-sm-3 control-label">番地以下</label>
                    <input type="text" name="address_number" class="form-control" value="{{$waitingplace->address_number}}">
                </div>
            </div>
            
            <!-- トラック横幅 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_size_wide" class="col-sm-3 control-label">横幅</label>
                    <input type="text" name="track_size_wide" class="form-control" value="{{$waitingplace->track_size_wide}}">
                </div>
            </div>
            
            <!-- 奥行き -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_size_depth" class="col-sm-3 control-label">奥行き</label>
                    <input type="text" name="track_size_depth" class="form-control" value="{{$waitingplace->track_size_depth}}">
                </div>
            </div>
            
            <!-- 高さ -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_size_height" class="col-sm-3 control-label">高さ</label>
                    <input type="text" name="track_size_height" class="form-control" value="{{$waitingplace->track_size_height}}">
                </div>
            </div>
            
            <!-- 重量 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_weight" class="col-sm-3 control-label">重量</label>
                    <input type="text" name="track_weight" class="form-control" value="{{$waitingplace->track_weight}}">
                </div>
            </div>
            
            <!-- 写真 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="img" class="col-sm-3 control-label">写真</label>
                    <input type="text" name="img" class="form-control" value="{{$waitingplace->img}}">
                </div>
            </div>
            
            <!-- 注意事項 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="notes" class="col-sm-3 control-label">注意事項</label>
                    <input type="text" name="notes" class="form-control" value="{{$waitingplace->notes}}">
                </div>
            </div>
            
            <!-- 会社ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="company_id" class="col-sm-3 control-label">会社ID</label>
                    <input type="text" name="company_id" class="form-control" value="{{$waitingplace->company_id}}">
                </div>
            </div>
            
 <!-- Save ボタン/Back ボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/waitingplaces') }}"> 
            Back
            </a> 
        </div>
        <!--/ Save ボタン/Back ボタン -->
        
        <!-- id 値を送信 -->
        <input type="hidden" name="id" value="{{$waitingplace->id}}" /> <!--/ id 値を送信 -->
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        </form>
</div> </div>
@endsection