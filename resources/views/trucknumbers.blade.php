@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            トラック登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- トラック登録フォーム -->
        <form action="{{ url('trucknumbers/store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- ナンバープレートエリア -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="numberplate_area" class="col-sm-3 control-label">ナンバープレートエリア</label>
                    <input type="text" name="numberplate_area" class="form-control">
                </div>
            </div>
            
            <!-- ナンバープレート種類 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="numberplate_kind" class="col-sm-3 control-label">ナンバープレート種類</label>
                    <input type="text" name="numberplate_kind" class="form-control">
                </div>
            </div>
            
            <!-- ナンバープレート用途 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="numberplate_use" class="col-sm-3 control-label">ナンバープレート用途</label>
                    <input type="text" name="numberplate_use" class="form-control">
                </div>
            </div>
            
            <!-- ナンバー -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="numberplate_number" class="col-sm-3 control-label">ナンバー</label>
                    <input type="text" name="numberplate_number" class="form-control">
                </div>
            </div>
            
            <!-- トラック車種 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="truck_kind" class="col-sm-3 control-label">トラック車種</label>
                    <input type="text" name="truck_kind" class="form-control">
                </div>
            </div>
            
            <!-- トラックドライバーID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_id" class="col-sm-3 control-label">ドライバーID</label>
                    <input type="text" name="driver_id" class="form-control" value="{{$driver->id}}">
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

