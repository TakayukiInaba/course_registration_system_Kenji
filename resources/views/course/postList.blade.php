@extends('layouts.main')

@section('title','名簿表示')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>連番</th>
                    <th>学籍番号</th>
                    <th>生徒氏名</th>
                    <th>1日目</th>
                    <th>2日目</th>
                    <th>3日目</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    @foreach ($item->entries as $entry)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$entry->getStudentId()}}</td>
                                <td>{{$entry->getStudentFirstName()}} {{$entry->getStudentName()}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <div class='row justify-content-center'>
        <div class="col-2">
            <a class="btn btn-secondary btn-block" role="button" href="{{route('list')}}" >戻る</a>
        </div>
    </div>
</div>
@endsection