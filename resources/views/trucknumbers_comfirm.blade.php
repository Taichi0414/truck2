@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            トラック登録情報確認
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>トラック情報</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        
                            <tr>
                                <!--ドライバーid -->
                                <td class="table-text">
                                    <div>{{ $trucknumber->driver_id }}</div>
                                </td>
                                <!-- トラックナンバー -->
                                <td class="table-text">
                                    <div>{{ $trucknumber->numberplate_number}}</div>
                                </td>
                    <!--登録ボタン -->
                                <td>
                                    <form action="{{ url('driver/'.$trucknumber->driver_id.'/user_waitingplaces') }}" method="GET"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        登録完了→待機場一覧へ
                                        </button>
                                    </form>
                                </td>
                    <!-- 更新ボタン --> 
                                <td>
                                    <form action="{{ url('trucknumbersedit/'.$trucknumber->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        修正
                                        </button>
                                    </form>
                                </td>
			        <!-- 削除ボタン -->
                                <td>
                                    <form action="{{ url('trucknumber/'.$trucknumber->id) }}" method="POST">
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
