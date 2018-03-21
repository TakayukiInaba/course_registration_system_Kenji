@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">生徒用新規登録画面</div>

                    <div class="panel-body">
                    
                        <div >
                            <p>登録が完了しました。</p>
                            <div class="col-md-10">
                                <a class="btn btn-primary btn-block" role="button" href="{{route('student.top')}}">会員画面へ進む</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection