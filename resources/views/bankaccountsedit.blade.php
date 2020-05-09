@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('bankaccounts/update') }}" method="POST">
        <!-- bank_name -->
        <div class="form-group">
            <label for="bank_name">銀行名</label>
            <input type="text" name="bank_name" class="form-control" value="{{$bankaccount->bank_name}}">
        </div>
        <!--/ bank_name -->
        
        <!-- bank_store -->
        <div class="form-group">
            <label for="bank_store">銀行支店名</label>
            <input type="text" name="bank_store" class="form-control" value="{{$bankaccount->bank_store}}">
        </div>
        <!--/ bank_store -->
        
        <!-- bank_kind -->
        <div class="form-group">
            <label for="bank_kind">口座種別</label>
            <input type="text" name="bank_kind" class="form-control" value="{{$bankaccount->bank_kind}}">
        </div>
        <!--/ bank_kind -->
        
        <!-- bank_account -->
        <div class="form-group">
            <label for="bank_account">口座番号</label>
            <input type="text" name="bank_account" class="form-control" value="{{$bankaccount->bank_account}}"/>
        </div>
        <!--/ bank_account -->
        
        <!-- company_id -->
        <div class="form-group">
            <label for="company_id">会社id</label>
            <input type="text" name="company_id" class="form-control" value="{{$bankaccount->company_id}}"/>
        </div>
        <!--/ company_id -->
        
        <!-- Save ボタン/Back ボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/bankaccounts') }}"> 
            Back
            </a> 
        </div>
        <!--/ Save ボタン/Back ボタン -->
        
        <!-- id 値を送信 -->
        <input type="hidden" name="id" value="{{$bankaccount->id}}" /> <!--/ id 値を送信 -->
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        </form>
</div> </div>
@endsection