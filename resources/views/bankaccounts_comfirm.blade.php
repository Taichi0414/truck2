@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            銀行口座登録情報確認
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
    
    <!--  現在の登録口座 -->
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                     <!--テーブルヘッダ -->
                    <thead>
                        <th>口座情報</th>
                        <th>&nbsp;</th>
                    </thead>
                     <!--テーブル本体 -->
                    <tbody>
                            <tr>
                                 <!--会社id -->
                                <td class="table-text">
                                    <div>{{ $bankaccount->company_id }}</div>
                                </td>
                                 <!--口座名 -->
                                <td class="table-text">
                                    <div>{{ $bankaccount->bank_name }}</div>
                                </td>
                     <!--ドライバー: 登録ボタン -->
                                <td>
                                    <form action="{{ url('company/'.$bankaccount->company_id.'/drivers') }}" method="GET"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        ドライバー登録へ
                                        </button>
                                    </form>
                                </td>
                    <!--待機場所: 登録ボタン -->
                                <td>
                                    <form action="{{ url('company/'.$bankaccount->company_id.'/waitingplaces') }}" method="GET"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        待機場所登録へ
                                        </button>
                                    </form>
                                </td>
                     <!--更新ボタン -->
                                <td>
                                    <form action="{{ url('bankaccountsedit/'.$bankaccount->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        修正
                                        </button>
                                    </form>
                                </td>
			         <!--削除ボタン -->
                                <td>
                                    <form action="{{ url('bankaccount/'.$bankaccount->id) }}" method="POST">
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
