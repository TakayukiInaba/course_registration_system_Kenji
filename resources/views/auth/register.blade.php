@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">新規登録画面</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <!--「姓」(first_name) 入力 !-->
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">姓</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--「名」(name) 入力 !-->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!--「教科」(subject_id) 入力 !-->
                        <div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
                            <label for="subject_id" class="col-md-4 control-label">教科</label>

                            <div class="col-md-6">
                                <select id="subject_id"  class="form-control" name="subject_id" required>
                                    <option value="">以下より選択したください</option> 
                                    <option value="1">国語</option>
                                    <option value="2">社会</option>
                                    <option value="3">理科</option>
                                    <option value="4">数学</option>
                                    <option value="5">英語</option>
                                    <option value="6">その他</option>
                                </select> 

                                @if ($errors->has('subject_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--「パスワード」(password) 入力 !-->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="col-md-4 control-label">パスワード(確認用)</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
