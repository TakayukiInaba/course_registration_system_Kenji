@extends('layouts.adMain')

@section('title','不開講講座一覧')

@section('content')
        <div class="row">
            <div class="col-md-8">
                <h3>不開講講座一覧</h3>
            </div>
            <div class="col-md-2">
                <a class="btn btn-danger btn-block" href="{{route('shingaku.cancellist.export.pdf')}}" role="button">PDF出力</a>  
            </div>
            <div class="col-md-2">
                <a class="btn btn-success  btn-block" href="{{route('shingaku.cancellist.export.excel')}}" role="button">Excel出力</a>
            </div>
        </div>
        <table class="table text-center table-bordered">
            <thead class="bg-light">
                <tr>
                    <th scope="col">学籍番号</th>
                    <th scope="col">生徒氏名</th>
                    <th scope="col">期間</th>
                    <th scope="col">講座名</th>
                    <th scope="col">担当教員</th>
                    <th scope="col">教材費</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ghostEntries as $item)   
                    <tr>
                        <td>{{$item->getStudentId()}}</td>
                        <td>{{$item->getStudentLastName().$item->getStudentName()}}</td>
                        <td>{{$item->getCourseTerm()}}期{{$item->getCourseTime()}}限</td>
                        <td>{{$item->getCourseTitle()}}</td>
                        <td>{{$item->getCourseTeacher()}}</td>
                        <td>￥{!! number_format($item->getCourseFee()) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection