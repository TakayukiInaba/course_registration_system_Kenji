@extends('layouts.login')

@section('title','新規登録')

@section('navbar')
    <nav class="navbar navbar-expand navbar-dark fixed-top d-print-none">
        <a class="navbar-brand" href="#">進学講習システム</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <span class="navbar-text ml-auto">
            <a class="nav-item nav-link btn btn-outline-light" href="{{route('student.login')}}">ログイン</a>
        </span>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-4 offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>新規登録ページ</h3></div>

                <div class="panel-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST">
                        {{ csrf_field() }}
                        <!--「姓」(first_name) 入力 !-->
                        <div class="row">
                            <div class="col form-group">
                                <label for="first_name">姓</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name',$student->first_name) }}" required autofocus>
                            </div>
                            <!--「名」(name) 入力 !-->
                            <div class="col form-group">
                                <label for="name">名</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$student->name) }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$student->email) }}" required>
                        </div>

                        <!--「学籍番号」(student_id) 入力 !-->
                        <div class="form-group">
                            <label for="student_id">学籍番号</label>
                            <input id="student_id" type="number" class="form-control" name="student_id" value="{{ old('student_id',$student->student_id) }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="student_id-confirm">学籍番号(確認用)</label>
                            <input id="student_id-confirm" type="number" class="form-control" name="student_id_confirmation" required>
                        </div>

                        <!--「パスワード」(password) 入力 !-->
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">パスワード(確認用)</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection