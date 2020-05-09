@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            レビュー登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- トラック登録フォーム -->
        <form action="{{ url('reviews/store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- ドライバーID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_id" class="col-sm-3 control-label">ドライバーID</label>
                    <input type="text" name="driver_id" class="form-control">
                </div>
            </div>
            
            <!-- 待機場所ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="waitingplace_id" class="col-sm-3 control-label">待機場所ID</label>
                    <input type="text" name="waitingplace_id" class="form-control">
                </div>
            </div>
            
            <!-- 使用時間ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="time_id" class="col-sm-3 control-label">使用時間ID</label>
                    <input type="text" name="time_id" class="form-control">
                </div>
            </div>
            
            <!-- レビュー星評価 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="review_star" class="col-sm-3 control-label">レビュー星評価</label>
                    <input type="text" name="review_star" class="form-control">
                </div>
            </div>
            
            <!-- レビューコメント -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="review_text" class="col-sm-3 control-label">レビューコメント</label>
                    <input type="text" name="review_text" class="form-control">
                </div>
            </div>

            <!-- 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        登録
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Book: 既に登録されてる本のリスト -->
    
     <!-- 現在の本 -->
    @if (count($reviews) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>レビュー一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <!-- 会社名 -->
                                <td class="table-text">
                                    <div>{{ $review->review_star}}</div>
                                </td>
                    <!-- 会社: 更新ボタン --> 
                                <td>
                                    <form action="{{ url('reviewsedit/'.$review->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        更新 
                                        </button>
                                    </form>
                                </td>
			        <!-- 会社: 削除ボタン -->
                                <td>
                                    <form action="{{ url('review/'.$review->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    　　<button type="submit" class="btn btn-danger">
                                                削除
                                    　　</button>
                                　　</form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection

