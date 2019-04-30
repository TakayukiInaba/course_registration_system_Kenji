@extends('layouts.adMain')

@section('title','期間編集')

@section('content')
<div class="container">
 
    <form action="{{url('shingaku/updateteacher')}}" method="POST">
    {{ csrf_field() }}

        <div class="form-row">
            <div class="col">
                <label for="value">姓</label>
                <input type="text"class="form-control" id="value" name="value" value='{{$TargetTeacherObj->value}}'>
            </div>

            <div class="col">
                <label for="name">名</label>
                <input type="text" class="form-control" id="name" name="name" value='{{$TargetTeacherObj->name}}'>
            </div>

            <div class="col">
                <label for="position">役職</label>
                {{Form::select('position',$positionOption,$TargetTeacherObj->position,['class' =>'form-control','id'=>'position'])}}
            </div>

            <div class="col">
                <label for="subject_id">教科</label>
                {{Form::select('subject_id',$subjectOption, $TargetTeacherObj->subject_id,['class' =>'form-control','id'=>'subject_id'])}}
            </div>

        </div>
        
        <br>
            <div class="row justify-content-end">
                <div class="col-2">
                    <input type="hidden" name="id" value="{{$TargetTeacherObj->id}}">
                    <button class="btn btn-primary btn-block" type="submit">再登録</button>
                </div>
        
                <div class="col-1">
                    <a class="btn btn-secondary btn-block" role="button" href="{{route('shingaku.teacheroption')}}" >戻る</a>
                </div>
            </div>
    </form>
</div>
@endsection