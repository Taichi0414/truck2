@extends('layouts.app')
@section('content')

        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
    
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
          <h1>Sign In</h1>
          @if(count($errors) >0)
          <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
          @endforeach
          </div>
          @endif
              <form action="{{ url('signin') }}" method="post">
                  <div class="form-group">
                  <label for="driver_email">E-Mail</label>
                  <input type="text" id="driver_email" name="driver_email" class="form-control">
                  </div>
                  <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control">
                  </div>
                  
                  <button type="submit" class="btn btn-primary">ログイン</button>
                  
                  {{ csrf_field() }}
              </form>
             </div>
          </div>
@endsection

