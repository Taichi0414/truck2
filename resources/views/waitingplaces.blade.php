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

        <!-- 登録フォーム -->
        <form enctype="multipart/form-data" action="{{ url('waitingplaces/store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 待機場所名称 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="place" class="col-sm-3 control-label">待機場所名称</label>
                    <input type="text" name="place" class="form-control">
                </div>
            </div>
            
            <!-- 都道府県 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="address_prefecture" class="col-sm-3 control-label">都道府県</label>
                    <input type="text" name="address_prefecture" class="form-control">
                </div>
            </div>
            
            <!-- 市区町村 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="address_municipality" class="col-sm-3 control-label">市区町村</label>
                    <input type="text" name="address_municipality" class="form-control">
                </div>
            </div>
            
            <!-- 番地以下 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="address_number" class="col-sm-3 control-label">番地以下</label>
                    <input type="text" name="address_number" class="form-control">
                </div>
            </div>
            
            <!-- トラック横幅 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_size_wide" class="col-sm-3 control-label">横幅</label>
                    <input type="text" name="track_size_wide" class="form-control">
                </div>
            </div>
            
            <!-- 奥行き -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_size_depth" class="col-sm-3 control-label">奥行き</label>
                    <input type="text" name="track_size_depth" class="form-control">
                </div>
            </div>
            
            <!-- 高さ -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_size_height" class="col-sm-3 control-label">高さ</label>
                    <input type="text" name="track_size_height" class="form-control">
                </div>
            </div>
            
            <!-- 重量 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="track_weight" class="col-sm-3 control-label">重量</label>
                    <input type="text" name="track_weight" class="form-control">
                </div>
            </div>
            
            <!-- 写真 -->
            <div class="form-group">
                <div class="col-sm-6"> 
                    <label>画像</label>
                    <input type="file" name="img">
                </div>
            </div>
            
            <!-- 注意事項 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="notes" class="col-sm-3 control-label">注意事項</label>
                    <input type="text" name="notes" class="form-control">
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

