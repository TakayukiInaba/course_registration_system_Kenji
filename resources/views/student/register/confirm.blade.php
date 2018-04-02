@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">生徒用新規登録画面</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}

                        <!--「姓」(first_name) 入力 !-->
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">姓</label>

                            <div class="col-md-6">
                                <strong>{{ $data['first_name'] }}</strong>
                            </div>
                        </div>

                        <!--「名」(name) 入力 !-->
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">名</label>

                            <div class="col-md-6">
                                <strong>{{ $data['name'] }}</strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">メールアドレス</label>

                            <div class="col-md-6">
                                <strong>{{ $data['email'] }}</strong>
                            </div>
                        </div>


                        <!--「学籍番号」(student_id) 入力 !-->
                        <div class="form-group">
                            <label for="student_id" class="col-md-4 control-label">学籍番号</label>

                            <div class="col-md-6">
                                <strong>{{ $data['student_id'] }}</strong>
                            </div>
                        </div>

                        <!--「パスワード」(password) 入力 !-->
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">パスワード</label>

                            <div class="col-md-6">
                                <strong>{{ $data['password'] }}</strong>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>

                            <div class="col-md-6">
                                <a class="btn btn-secondary btn-block" role="button" href="{{route('student.register.insdex')}}" >戻る</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection