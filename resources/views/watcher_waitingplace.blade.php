@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">

        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        
     <!-- 現在利用可能な待機場所一覧 -->
    @if (count($waitingplaces) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>待機場所一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($waitingplaces as $waitingplace)
                            <tr>
                                <!-- 待機場所名 -->
                                <td class="table-text">
                                    <div>{{ $waitingplace->place}}</div>
                                </td>
                                <!-- 待機場所　都道府県 -->
                                <td class="table-text">
                                    <div>{{ $waitingplace->address_prefecture}}</div>
                                </td>
                                <!-- 待機場所　市町村 -->
                                <td class="table-text">
                                    <div>{{ $waitingplace->address_municipality}}</div>
                                </td>
                   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection

