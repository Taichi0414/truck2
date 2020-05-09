@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            銀行口座登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
            
        <!-- 口座登録フォーム -->
        <form action="{{ url('bankaccounts/store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 銀行名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="bank_name" class="col-sm-3 control-label">銀行名</label>
                    <input type="text" name="bank_name" class="form-control">
                </div>
            </div>
            
            <!-- 銀行支店名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="bank_store" class="col-sm-3 control-label">銀行支店名</label>
                    <input type="text" name="bank_store" class="form-control">
                </div>
            </div>
            
            <!-- 口座種別 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="bank_kind" class="col-sm-3 control-label">口座種別</label>
                    <input type="text" name="bank_kind" class="form-control">
                </div>
            </div>
            
            <!-- 口座番号 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="bank_account" class="col-sm-3 control-label">口座番号</label>
                    <input type="text" name="bank_account" class="form-control">
                </div>
            </div>
            
             <!--会社id -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="company_id" class="col-sm-3 control-label" >会社id</label>
                    <input type="text" name="company_id" class="form-control" value="{{$company->id}}">
                </div>
            </div>

            <!-- 口座情報 登録ボタン -->
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
