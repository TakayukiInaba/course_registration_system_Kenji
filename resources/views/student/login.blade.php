@extends('layouts.login')

@section('content')
    <div class="row">
        <div class="col-4 offset-4">
            <div class="panel panel-default">
                <div class="panel-heading "><h3>ログインページ</h3></div>
                <div class="panel-body">
                    <form method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col control-label">メールアドレス</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col control-label">パスワード</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>ログイン情報を記憶する
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="form-group col-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    ログイン
                                </button>
                            </div>
                            <div class="col offset-1">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    パスワードを忘れた方はこちら
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection