@extends('layouts.main')

@section('title','生徒用トップページ')
@section('content')
<div class="row justify-content-center">
    <h3>登録が完了しました。</h3>
</div>
<br>
<div class='row justify-content-center'>
    <div class="col-2">
        <a class="btn btn-secondary btn-block" role="button" href="{{route('student.top')}}" >トップページへ戻る</a>
    </div>
</div>
@endsection