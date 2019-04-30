@extends('layouts.adMain')

@section('title','テーブル設定')

@section('content')
<div class="container">
    <div class="row">
        <h3>「時限」テーブル<h3>
    </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <label for="value">表示</label>
                        <select class="form-control" id="value" name="value">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>      
                </div>
           
                <div class="col">
                    <label for="st_hour">開始時間</label>
                        <select class="form-control" id="st_hour" name="st_hour">
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                        </select>   
                </div>

                <div class="col">
                    <label for="st_min">開始時間(分)</label><br>
                        <select class="form-control" id="st_min" name="st_min">
                            <option>00</option>
                            <option>05</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>25</option>
                            <option>30</option>
                            <option>35</option>
                            <option>40</option>
                            <option>45</option>
                            <option>50</option>
                            <option>55</option>
                        </select>   
                </div>
           
                <div class="col">
                    <label for="lst_hour">終了時間</label>
                        <select class="form-control" id="lst_hour" name="lst_hour">
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                        </select>   
                </div>

                <div class="col">
                    <label for="lst_min">終了時間(分)</label><br>
                        <select class="form-control" id="lst_min" name="lst_min">
                        <option>00</option>
                            <option>05</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>25</option>
                            <option>30</option>
                            <option>35</option>
                            <option>40</option>
                            <option>45</option>
                            <option>50</option>
                            <option>55</option>
                        </select>   
                </div>

            </div>
            <br>
                <div class="form-row justify-content-end">
                    <div class="col-2">        
                        <button type="submit" class="btn btn-primary btn-block" >登録</button>
                    </div>
                </div>
        </form>
  

        <div class="row">
                <table class="table table-hover ">
                    <thead class="thead-light">
                        <tr>
                            <th>表示</th>
                            <th>開始時間</th>
                            <th>終了時間</th>
                            <th>修正</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($times->count() > 0)
                            @foreach ($times as $time)
                                <tr>
                                    <td>{{$time->value}}</td>
                                    <td> {!! date('G時i分',strtotime($time->st_time)) !!}</td>
                                    <td>{!! date('G時i分',strtotime($time->lst_time)) !!}</td>
                                    <td><a class="btn btn-info" href="{{url('shingaku/edittime/'.$time->id)}}" role="button">修正</a></td>
                                    <td><a class="btn btn-danger" href="{{url('shingaku/deletetime/'.$time->id)}}" role="button">削除</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            　　</table>
        </div>
</div>
@endsection