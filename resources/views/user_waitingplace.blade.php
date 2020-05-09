@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title"　style="font-size:30px">
            待機場所選択画面
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        
    <!--ドライバーID表示-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_id" class="col-sm-3 control-label col-sm-3 control-label--extend">ドライバーID</label>
                    <input type="text" name="driver_id" class="form-control" value="{{$driver->id}}">
                </div>
            </div>

    <!--↓↓ 検索フォーム ↓↓-->
        <div class="card-title">
            待機場所検索
        </div>
        <div class="col-sm-4">
            <form class="form-inline" action="{{url('driver/'.$driver->id.'/user_waitingplaces/search')}}">
              <div class="form-group">
                  <input type="text" name="keyword"  class="form-control" placeholder="エリアを入力してください">
              </div>
              <input type="submit" value="検索" class="btn btn-info">
            </form>
        </div>
    <!--↑↑ 検索フォーム ↑↑-->
    
    待機場所名一覧
    <div class="container">
        @if(count($waitingplaces) > 0)
          <div class="row">
            @foreach($waitingplaces as $waitingplace)
            <tr>
                <td>
                    <div class="col-md-3">
                      {{ $waitingplace->place }}
                    </div>
                </td>
            <!--登録ボタン -->
                <td>
                    <form action="{{ url('driver/'.$driver->id.'/waitingplace/'.$waitingplace->id.'/reservation') }}" method="GET"> 
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                        選択
                        </button>
                    </form>
                </td>
                <br>
            </tr>
            @endforeach
           </div>
        @endif
        
        <!--↓↓ 予約状況確認 ↓↓-->
        <div>
            <form action="{{ url('driver/'.$driver->id.'/reservation_comfirm') }}" method="GET"> 
            {{ csrf_field() }}
            <button type="submit" class="btn btn-info">
                予約一覧
            </button>
            </form>
        </div>
        <!--↑↑ 予約状況確認 ↑↑-->

@endsection

