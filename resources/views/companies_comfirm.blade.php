@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            会社登録情報確認
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

     <!-- 登録情報-->
    
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                     <!--テーブルヘッダ -->
                    <thead>
                        <th>会社情報</th>
                        <th>&nbsp;</th>
                    </thead>
                     <!--テーブル本体 -->
                    <tbody>
                        
                            <tr>
                                 <!--会社id -->
                                <td class="table-text">
                                    <div>{{ $company->id }}</div>
                                </td>
                                 <!--会社名 -->
                                <td class="table-text">
                                    <div>{{ $company->name }}</div>
                                </td>
                    <!--会社: 登録ボタン -->
                                <td>
                                    <form action="{{ url('company/'.$company->id.'/bankaccounts') }}" method="GET"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        銀行口座登録へ
                                        </button>
                                    </form>
                                </td>
                     <!--会社: 更新ボタン -->
                                <td>
                                    <form action="{{ url('companiesedit/'.$company->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        修正 
                                        </button>
                                    </form>
                                </td>
			         <!--会社: 削除ボタン -->
                                <td>
                                    <form action="{{ url('company/'.$company->id) }}" method="POST">
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
