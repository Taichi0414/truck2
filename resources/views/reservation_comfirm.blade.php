@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            予約待機場所一覧
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        {{ csrf_field() }}

<table class="table table-striped task-table">
    <!-- テーブルヘッダ -->
<thead>
    <th>予約内容の表示</th>
    <th>&nbsp;</th>
</thead>
<tbody>
    <div class="container">
        @if(count($reservations) > 0)
          <div class="row">
            @foreach($reservations as $reservation)
            <tr>
                @if($reservation->driver_id == $driver->id)
                <!--ドライバーID-->
                <td>
                    <div class="table-text">
                     ドライバーID： {{ $reservation->driver_id }}
                    </div>
                </td>
                <!--待機場所ID-->
                <td>
                    <div class="table-text">
                      待機場所ID：{{ $reservation->waitingplace_id }}
                    </div>
                </td>
                <!--スタート時間-->
                <td>
                    <div class="table-text">
                      開始時間：{{ $reservation->start_at }}
                    </div>
                </td>
                <!--スタート時間-->
                <td>
                    <div class="table-text">
                      終了時間：{{ $reservation->end_at }}
                    </div>
                </td>
                <!-- 削除ボタン -->
                <td>
                    <form action="{{ url('reservation/'.$reservation->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">
                            削除
                        </button>
                    </form>
                </td>
                @endif
                
            </tr>
            @endforeach
           </div>
        @endif
      </tbody>
@endsection
