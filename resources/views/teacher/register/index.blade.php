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
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>新規登録ページ</h3></div>
                @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <div class="panel-body">
                    <form method="POST">
                        {{ csrf_field() }}
                        <!--「姓」(first_name) 入力 !-->
                        <div class="row">
                            <div class="col form-group">
                                <label for="value">姓</label>
                                <input id="value" type="text" class="form-control" name="value" value="{{ old('value',$teacher->value) }}" required autofocus>
                            </div>
                            <!--「名」(name) 入力 !-->
                            <div class="col form-group">
                                <label for="name">名</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$teacher->name) }}" required autofocus>
                            </div>
                        </div>

                        <!--「教科番号」(subject_id) 入力 !-->
                        <div class="form-group">
                            <label for="subject_id">教科</label>                    
                            <select id="subject_id"  class="form-control" name="subject_id" required>
                                <option value="">以下より選択してください</option> 
                                @foreach($subjects as $subObj)
                                    <option value="{{$subObj->id}}" @if( old('subject_id',$teacher->subject_id) == $subObj->id) selected @endif >{{$subObj->value}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="form-group">
                            <label for="position_id">役職</label>                    
                            <select id="position_id"  class="form-control" name="position_id" required>
                                <option value="">以下より選択してください</option> 
                                @foreach($positions as $positionObj)
                                    <option value="{{$positionObj->id}}" @if( old('position_id',$teacher->position_id) == $positionObj->id) selected @endif >{{$positionObj->value}}</option>
                                @endforeach                             
                            </select> 
                        </div>

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$teacher->email) }}" required>
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