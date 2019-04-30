@extends('layouts.login')

@section('title','ログイン')

@section('navbar')
    <nav class="navbar navbar-expand navbar-dark fixed-top d-print-none">
    <a class="navbar-brand" href="#">進学講習システム</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="ナビゲーションの切替">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <span class="navbar-text ml-auto">
        <a class="nav-item nav-link btn btn-outline-light" href="{{route('teacher.register.index')}}">新規登録</a>
    </span>
    </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>ログインページ</h3></div>
                <div class="panel-body">
                    <form method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div> 

                        <div class="row justify-content-center">
                            <div class="col-7">
                                <button type="submit" class="btn btn-primary btn-block">
                                    ログイン
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection