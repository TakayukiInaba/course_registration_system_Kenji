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

    <div class="row justify-content-center">
        <h4>登録が完了しました。</h4>
    </div>
    <br>
    <div class='row justify-content-center'>
        <div class="col-2">
            <a class="btn btn-primary btn-block" role="button" href="{{route('student.top')}}">会員画面へ進む</a>
        </div>
    </div>
    <br>
@endsection