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
        
    </span>
    </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>ログインページ</h3></div>
                @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="panel-body">
                    <form method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="username">学籍番号</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
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