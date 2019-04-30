@extends('layouts.adMain')

@section('title','管理者登録')

@section('content')
    <div class="row">
        <div class="col-4 offset-4">
            <div class="panel panel-default">
                <div>
                    @foreach($adminUser as $admin)
                        <p>{{$admin->username}}</p>
                        <p>{{$admin->password}}</p>
                    @endforeach
                   
                </div>
                <div class="panel-heading text-center"><h3>管理者情報を入力してください</h3></div>

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
                            <!--「名」(name) 入力 !-->
                            <div class="col form-group">
                                <label for="username">ユーザーネーム</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                            </div>
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
@endsection