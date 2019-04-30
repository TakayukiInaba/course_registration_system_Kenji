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
            <a class="nav-item nav-link btn btn-outline-light" href="{{route('teacher.login')}}">ログイン</a>
        </span>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form class="form-horizontal" method="POST">
            {{ csrf_field() }}
                <h5>下の内容で登録します。よろしいでしょうか？</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">姓</th>
                                <td>{{ $data['value'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">名</th>
                                <td>{{ $data['name'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">メールアドレス</th>
                                <td>{{ $data['email'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">教科名</th>
                                <td>{{ $sbjVal}}</td>
                            </tr>
                             <tr>
                                <th scope="row">役職</th>
                                <td>{{ $posiVal}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row justify-content-center">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">
                                登録
                            </button>
                        </div>
                        <div class="col">
                            <a class="btn btn-secondary btn-block" role="button" href="{{route('teacher.register.index')}}" >戻る</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection