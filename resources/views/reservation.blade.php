@extends('layouts.app')
@section('content')
<html>
    
<script>
    function calc_time() {
    var stime = document.getElementById("stime");
    // etimeの方が後にくるようにするエラーチェックを入れる
    var etime = document.getElementById("etime");
    document.getElementById("result_time").value = (etime.valueAsNumber - stime.valueAsNumber) / 1000 / 60;
    }
    
    function calc_fee() {
    var result_time = document.getElementById("result_time");
    var result_price = document.getElementById("result_price");
    document.getElementById("fee").value = result_time.value/15*result_price.value;
    }
</script>
    
<body>
    <table class="table table-striped task-table">
    <thead>
        <th>選択した待機場所情報</th>
    </thead>
    <tbody>
        <tr>
            <td class="table-text">
                <div>待機場所名:{{$waitingplace->place}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>都道府県:{{$waitingplace->address_prefecture}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>市区町村:{{$waitingplace->address_municipality}}</div>
            </td>
        </tr>
            <td class="table-text">
                <div>番地以下:{{$waitingplace->address_address_number}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>トラック横幅:{{$waitingplace->track_size_wide}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>奥行き:{{$waitingplace->track_size_depth}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>高さ:{{$waitingplace->track_size_height}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>重量:{{$waitingplace->track_weight}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>写真:</div><div><img src="upload/{{$waitingplace->img}}" width="300"></div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>注意事項:{{$waitingplace->notes}}</div>
            </td>
        </tr>
        <tr>
            <td class="table-text">
                <div>料金:{{$waitingplace->time->day1_fee}}</div>
            </td>
        </tr>
    </tbody>
    
    <div>
    利用料金確認
    </div>
    <br>
    料金単価：
    <input type="text" name="unitprice" style="height: 30px; width: 120px;" value="{{$waitingplace->time->day1_fee}}" id="result_price">
    <br>
    ※予約時間を入力後にクリック
    <input type="button" value="利用時間を計算する" onclick="calc_time();" class="btn btn-info">
    <input type="text" name="usetime" style="height: 30px; width: 120px;" id="result_time">
    <br>
    ※利用時間計算後にクリック<input type="button" value="利用料金を計算する" onclick="calc_fee();" class="btn btn-primary">
    
    
    <form method="POST" action="/reservation">
        {{ csrf_field() }}
        
        <!-- バリデーションエラーの表示に使用-->
        	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
            <!-- 完了メッセージ -->
        @if (session('result'))
            <div style="color:green;">
                {{ session('result') }}
            </div>
            <br>
        @endif
    
        <!-- 省略 -->
    
        <!-- エラー表示 -->
        @if($errors->any())
            <div style="color:red;">
                【エラー】<br><br>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            <br>
        @endif
            
            <!--getでdriver_idとwaitingplace_idを受け取り、待機場所情報一式を表示-->
            <!--ドライバーID表示-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="driver_id" class="col-sm-3 control-label">ドライバーID</label>
                    <input type="text" name="driver_id" class="form-control" value="{{$driver->id}}">
                </div>
            </div>
            <!--待機場所ID -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="waitingplace_id" class="col-sm-3 control-label">待機場所ID</label>
                    <input type="text" name="waitingplace_id" class="form-control" value="{{$waitingplace->id}}">
                </div>
            </div>
            
            予約時間
            <br>
                <br>
                <!--onchange属性を追加-->
                <input type="date" name="start_date" class="col-sm-3 control-label">
                <input type="time" step="900" name="start_time" id="stime" class="col-sm-3 control-label">
                <br>
                <input type="date" name="end_date" class="col-sm-3 control-label">
                <input type="time" step="900" name="end_time" id="etime" class="col-sm-3 control-label">
            <br>


            
            利用料金
            <br>
            <input type="text" name="fee" id="fee" class="col-sm-3 control-label">
            <br>
            <br>
            <button type="submit" class="btn btn-info">予約する</button>
            <br>
    </form>
    <!--予約一覧確認ボタン -->
    <form action="{{ url('driver/'.$driver->id.'/reservation_comfirm') }}" method="GET"> 
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">
            予約一覧
        </button>
    </form>
    
    

</body>
</html>
@endsection
