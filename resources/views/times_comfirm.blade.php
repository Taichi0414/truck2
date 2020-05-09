@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            利用条件登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>利用条件</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        
                            <tr>
                                <!--待機場所id -->
                                <td class="table-text">
                                    <div>{{$time->waitingplace_id}}</div>
                                </td>
                                <!-- 開始日時 -->
                                <td class="table-text">
                                    <div>{{$time->day1_start}}</div>
                                </td>
                                <!-- 終了日時 -->
                                <td class="table-text">
                                    <div>{{$time->day1_end}}</div>
                                </td>
                                <!-- 利用料金-->
                                <td class="table-text">
                                    <div>{{$time->day1_fee}}</div>
                                </td>
                    <!--登録ボタン -->
                                <td>
                                    <form action="{{ url('waitingplace/'.$time->waitingplace_id.'/watcher_waitingplaces') }}" method="GET"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        登録完了→待機場一覧へ
                                        </button>
                                    </form>
                                </td>
                    <!-- 修正ボタン --> 
                                <td>
                                    <form action="{{ url('timesedit/'.$time->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        修正
                                        </button>
                                    </form>
                                </td>
			        <!-- 削除ボタン -->
                                <td>
                                    <form action="{{ url('time/'.$time->id) }}" method="POST">
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

