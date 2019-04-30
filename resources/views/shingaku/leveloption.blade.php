@extends('layouts.adMain')

@section('title','テーブル設定')

@section('content')
    <div class="row">
        <h3>「期間」テーブル<h3>
    </div>
    <div class="row">
            <table class="table table-hover ">
                <thead class="thead-light">
                    <tr>
                        <th>表示</th>
                        <th>開始日</th>
                        <th>終了日</th>
                        <th>削除</th>
                        <th>修正</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($terms->count() > 0)
                        @foreach ($terms as $term)
                            <tr>
                                <td>{{$term->value}}</td>
                                <td>{{$term->st_day}}</td>
                                <td>{{$term->lst_day}}</td>
                                <td>ボタン</td>
                                <td>ボタン</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
        　　</table>
    </div>
    <div class="row">
        <h3>「時限」テーブル<h3>
    </div>
    <div class="row">
            <table class="table table-hover ">
                <thead class="thead-light">
                    <tr>
                        <th>表示</th>
                        <th>開始時間</th>
                        <th>終了時間</th>
                        <th>削除</th>
                        <th>修正</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($times->count() > 0)
                        @foreach ($times as $time)
                            <tr>
                                <td>{{$time->value}}</td>
                                <td>{{$time->st_time}}</td>
                                <td>{{$time->lst_time}}</td>
                                <td>ボタン</td>
                                <td>ボタン</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
        　　</table>
    </div>
    <div class="row">
        <div class=col>
            <div class="row">
                <h3>「レベル」テーブル<h3>
            </div>
            <div class="row">
                    <table class="table table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th>表示</th>
                                <th>削除</th>
                                <th>修正</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($levels->count() > 0)
                                @foreach ($levels as $level)
                                    <tr>
                                        <td>{{$level->value}}</td>
                                        <td>ボタン</td>
                                        <td>ボタン</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                　　</table>
            </div>
        <div>
        <div class="col">
            <div class="row">
                <h3>「学年・コース」テーブル<h3>
            </div>
            <div class="row">
                    <table class="table table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th>表示</th>
                                <th>削除</th>
                                <th>修正</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($grades->count() > 0)
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td>{{$grade->value}}</td>
                                        <td>ボタン</td>
                                        <td>ボタン</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                　　</table>
            </div>
        </div>
    </div>
@endsection