@extends('layouts.adMain')

@section('title','テーブル設定')

@section('content')
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <h3>生徒アカウント管理画面<h3>
    </div>

     <form action="{{route('shingaku.students.import')}}" method="POST" files="true" enctype = "multipart/form-data">
    {{ csrf_field() }}
   
        <div class="row">
            <div class="col-md-4">
                {!! Form::file('csv_file', null, []) !!}
            </div>
            <div class="col-md-8">
                {!! Form::submit('アップロード', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    </form>

  
        <div class="row">
                <table class="table table-hover ">
                    <thead class="thead-light">
                        <tr>
                            <th>学籍番号</th>
                            <th>学年クラス番号</th>
                            <th>姓</th>
                            <th>名</th>
                            <th>パスワード</th>
                            <th>修正</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($infStudentAccounts->count() > 0)
                            @foreach ($infStudentAccounts as $student)
                                <tr>
                                    <td>{{$student->username}}</td>
                                    <td>{{$student->grade_class_number}}</td>
                                    <td>{{$student->last_name}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->password}}</td>
                                    
                                    <td><a class="btn btn-info" href="{{url('shingaku/accountstudent/edit/'.$student->id)}}" role="button">修正</a></td>
                                    <td><a class="btn btn-danger" href="{{url('shingaku/accountstudent/delete/'.$student->id)}}" role="button">削除</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            　　</table>
        </div>
</div>
@endsection