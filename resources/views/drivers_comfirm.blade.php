@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            ドライバー登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

    
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>ドライバー情報</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                       
                            <tr>
                                <!--会社id -->
                                <td class="table-text">
                                    <div>{{ $driver->company_id }}</div>
                                </td>
                                <!-- ドライバー名 -->
                                <td class="table-text">
                                    <div>{{ $driver->driver_name}}</div>
                                </td>
                                <!--ドライバーid -->
                                <td class="table-text">
                                    <div>{{ $driver->id }}</div>
                                </td>
                    <!--登録ボタン -->
                                <td>
                                    <form action="{{ url('driver/'.$driver->id.'/trucknumbers') }}" method="GET"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        トラック登録へ
                                        </button>
                                    </form>
                                </td>
                    <!-- 修正ボタン --> 
                                <td>
                                    <form action="{{ url('driversedit/'.$driver->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        修正
                                        </button>
                                    </form>
                                </td>
			        <!-- 削除ボタン -->
                                <td>
                                    <form action="{{ url('driver/'.$driver->id) }}" method="POST">
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

