@extends('layouts.adMain')

@section('title','出力用CSVデータ')

@section('content')
        <div class="row">
            <div class="col-md-9">
                <h3>出力用CSVデータ</h3>
            </div>
            
            <div class="col-md-3">
                <a class="btn btn-success  btn-block" href="{{route('shingaku.courseslist.export.excel')}}" role="button">CSV出力</a>
            </div>
        </div>
        <table class="table text-center table-bordered">
            <thead class="bg-light">
                <tr>
                    <th scope="col">期間</th>
                    <th scope="col">学年</th>
                    <th scope="col">レベル</th>
                    <th scope="col">講座名</th>
                    <th scope="col">担当教員</th>
                    <th scope="col">生徒数</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Entries as $item)
                    <tr>
                        <td>{{$item->getTermVal()}}期{{$item->getTimeVal()}}限</td>
                        <td>{{$item->getGradeVal()}}</td>
                        <td>{{$item->getLevelVal()}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->getTeacherVal()}}</td>
                        <td>{{$item->entries_count}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection