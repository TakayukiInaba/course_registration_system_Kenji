@extends('layouts.main')

@section('title','教員用トップページ')
@section('content')
<!--ログイン処理を経ているか否かによって画面表示を切り替える-->     
<div class="row">
    <!--メニューリスト-->  
    <div class="sidebar col-sm-2 order-1">
        <h6>こんにちは{{$first_name}}さん。</h6>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{url('add')}}">講座登録/修正</a>
            <a class="list-group-item list-group-item-action" href="{{url('table')}}">時間割作成</a>
            <a class="list-group-item list-group-item-action" href="{{url('list')}}">名簿表示</a>
            <a class="list-group-item list-group-item-action" href="{{url('cancel')}}">講座取り消し</a>
        </div>
    </div>

    <!--講座一覧(userの教科のみ)-->  
    <div class="col-sm-10 order-2">
        <table class="table  table-hover">
            <thead class="thead-light">
                <tr>
                    <th>期間</th>
                    <th>教科</th>
                    <th>学年</th>
                    <th>レベル</th>
                    <th>講座名</th>
                    <th>担当</th>
                    <th>教材費</th>
                    <th>概要</th>
                </tr>
            </thead>
            <tbody>
                @if ($items->count() > 0)
                    @foreach ($items as $item)
                        <tr>
                            <td>{{$item->getTermVal()}}期{{$item->getTimeVal()}}限</td>
                            <td>{{$item->getSbjVal()}}</td>
                            <td>{{$item->getGradeVal()}}</td>
                            <td>{{$item->getLevelVal()}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->getTeacherVal()}}</td>
                            <td>￥{{$item->fee}}</td>
                            <td>
                                <button class="btn btn-default" data-toggle="modal" data-target="#{{$item->title}}">
                                概要
                                </button>
                                <!--概要ボタンの内容作成(モーダルの呼び出し) -->
                                @include('components.modal',['summary'=>'{{$item->summary}}','title'=>"{{$item->title}}"])
                            </td>
                        </tr>
                    @endforeach
                @else
                    </tbody>
                    </table>
                    <h2 class="text-center">登録されている講座はありません。</h2>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection