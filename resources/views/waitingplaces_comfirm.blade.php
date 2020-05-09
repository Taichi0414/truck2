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

        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>待機場所情報確認</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                       
                            <tr>
                                <!-- 待機場所id -->
                                <td class="table-text">
                                    <div>{{ $waitingplace->id}}</div>
                                </td>
                                <!-- 待機場所名 -->
                                <td class="table-text">
                                    <div>{{ $waitingplace->place}}</div>
                                </td>
                                <!--会社id -->
                                <td class="table-text">
                                    <div>{{ $waitingplace->company_id }}</div>
                                </td>
                                <!--待機場所画像-->
                                <td>
                                    <div> <img src="upload/{{$waitingplace->img}}" width="300"></div>
                                </td>
                                <td>
                                    <form action="{{ url('waitingplace/'.$waitingplace->id.'/times') }}" method="GET"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        料金登録へ 
                                        </button>
                                    </form>
                                </td>
                    <!-- 修正ボタン --> 
                                <td>
                                    <form action="{{ url('waitingplacesedit/'.$waitingplace->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        修正
                                        </button>
                                    </form>
                                </td>
			        <!-- 削除ボタン -->
                                <td>
                                    <form action="{{ url('waitingplace/'.$waitingplace->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    　　<button type="submit" class="btn btn-danger">
                                                削除
                                    　　</button>
                                　　</form>
                                </td>
                            </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>


@endsection
