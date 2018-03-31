@extends('layouts.main')

@section('title','名簿表示')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
        <table class="table  table-hover">
            <thead class="thead-light">
                <tr>
                    <th>期間</th>
                    <th>教科</th>
                    <th>学年</th>
                    <th>レベル</th>
                    <th>講座名</th>
                    <th>担当</th>
                    <th>人数</th>
                    <th>名簿表示</th>
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
                                <td>{{$item->entries_count}}人</td>
                                <td>
                                    <a class="btn btn-info btn-block" role="button" href="{{url('list/'.$item->id)}}" >表示</a>
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
    <div class='row justify-content-center'>
        <div class="col-3">
            <a class="btn btn-danger btn-block" role="button" href="#" >講座を取り消す</a>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary btn-block" role="button" href="{{route('/')}}" >戻る</a>
        </div>
    </div>

</div>
@endsection