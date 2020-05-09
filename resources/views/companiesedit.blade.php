@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('companies/update') }}" method="POST">
        <!-- name -->
        <div class="form-group">
            <label for="name">会社名</label>
            <input type="text" name="name" class="form-control" value="{{$company->name}}">
        </div>
        <!--/ name -->
        
        <!-- tel_number -->
        <div class="form-group">
            <label for="tel_number">会社電話番号</label>
            <input type="text" name="tel_number" class="form-control" value="{{$company->tel_number}}">
        </div>
        <!--/ tel_number -->
        
        <!-- email -->
        <div class="form-group">
            <label for="email">会社メールアドレス</label>
            <input type="text" name="email" class="form-control" value="{{$company->email}}">
        </div>
        <!--/ email -->
        
        <!-- user_flg -->
        <div class="form-group">
            <label for="user_flg">待機場所利用者フラグ</label>
            <input type="text" name="user_flg" class="form-control" value="{{$company->user_flg}}"/>
        </div>
        <!--/ user_flg -->
        
        <!-- holder_flg -->
        <div class="form-group">
            <label for="holder_flg">待機場所利用者フラグ</label>
            <input type="text" name="holder_flg" class="form-control" value="{{$company->holder_flg}}"/>
        </div>
        <!--/ holder_flg -->
        
        <!-- Save ボタン/Back ボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}"> 
            Back
            </a> 
        </div>
        <!--/ Save ボタン/Back ボタン -->
        
        <!-- id 値を送信 -->
        <input type="hidden" name="id" value="{{$company->id}}" /> <!--/ id 値を送信 -->
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        </form>
</div> </div>
@endsection