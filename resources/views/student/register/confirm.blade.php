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
            <form class="form-horizontal" method="POST">
            {{ csrf_field() }}
                <h4>下の内容で登録します。よろしいでしょうか？</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">姓</th>
                                <td>{{ $data['first_name'] }}</td>
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
                                <th scope="row">学籍番号</th>
                                <td>{{ $data['student_id'] }}</td>
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
                            <a class="btn btn-secondary btn-block" role="button" href="{{route('student.register.index')}}" >戻る</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection