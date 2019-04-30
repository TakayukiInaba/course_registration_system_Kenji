@extends('layouts.adMain')

@section('title','期間編集')

@section('content')
<div class="container">
 
    <form action="{{url('shingaku/accountstudent/update')}}" method="POST">
    {{ csrf_field() }}

        <div class="form-row">
            <div class="col">
                <label for="last_name">姓</label>
                <input type="text"class="form-control" id="last_name" name="last_name" value='{{$TargetStudentObj->last_name}}'>
            </div>

            <div class="col">
                <label for="name">名</label>
                <input type="text" class="form-control" id="name" name="name" value='{{$TargetStudentObj->name}}'>
            </div>

            <div class="col">
                <label for="username">ユーザーID</label>
                <input type="text"class="form-control" id="username" name="username" value='{{$TargetStudentObj->username}}'>
            </div>

            <div class="col">
                <label for="grade_class_number">パスワード</label>
                <input type="text"class="form-control" id="grade_class_number" name="grade_class_number" value='{{$TargetStudentObj->grade_class_number}}'>
            </div>

        </div>
        
        <br>
            <div class="row justify-content-end">
                <div class="col-2">
                    <input type="hidden" name="id" value="{{$TargetStudentObj->id}}">
                    <button class="btn btn-primary btn-block" type="submit">再登録</button>
                </div>
        
                <div class="col-1">
                    <a class="btn btn-secondary btn-block" role="button" href="{{route('shingaku.accountstudents')}}" >戻る</a>
                </div>
            </div>
    </form>
</div>
@endsection