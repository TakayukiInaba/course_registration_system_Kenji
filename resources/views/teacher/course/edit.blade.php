@extends('layouts.main')

@section('title','新規講座登録')

@section('content')

 <!-- バリデーションエラー時の表示-->
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- バリデーションエラー時の表示-->

<form action="{{url('teacher/update')}}" method="POST">
{{ csrf_field() }}

    <div class="form-row">
        <div class="col-1">
            <label for="term_id">期</label>
            {{Form::select('term_id',$optTerms,$tgtCourse->term_id,['class' =>'form-control','id'=>'term_id'])}}
        </div>

        <div class="col-1">
            <label for="time_id">限</label>
            {{Form::select('time_id',$optTimes,$tgtCourse->time_id,['class' =>'form-control','id'=>'time_id'])}}
        </div>

        <div class="col-1">
            <label for="subject_id">教科</label>
            {{Form::select('subject_id',$optSbj,$tgtCourse->subject_id,['class' =>'form-control','id'=>'subject_id','tabindex'=>'-1'])}}
        </div>

        <div class="col-2">
            <label for="grade_id">学年</label>
            {{Form::select('grade_id',$optGrades,$tgtCourse->grade_id,['class' =>'form-control','id'=>'grade_id'])}}
        </div>

        <div class="col-1">
            <label for="level_id">レベル</label>
            {{Form::select('level_id',$optLevels,$tgtCourse->level_id,['class'=>'form-control','id'=>'level_id'])}}
        </div>

        <div class="col-3">
            <label for="title">講座名</label>
            <input class="form-control" type="text" id="title" name="title" value="{{$tgtCourse->title}}">
        </div>


        <div class="col-2">
            <label for="teacher_id">担当教員</label>
            {{Form::select('teacher_id',$optTeachers,$tgtCourse->teacher_id,['class'=>'form-control','id'=>'teacher_id'])}}
        </div>

        <div class="col-1">
            <label for="fee">教材費</label>
            <input class="form-control" type="text" id="fee" value="{{$tgtCourse->fee}}" name="fee">
        </div>
    </div>
    <div class="form-row">
        <div class="col-12">
            <label for="summary">概要</label>
            <textarea class="form-control" id="content" rows="3" name="summary">{{$tgtCourse->summary}}</textarea>
        </div>
    </div>
    
    <br>
        <div class="row justify-content-end">
            <div class="col-2">
                <input type="hidden" name="id" value="{{$tgtCourse->id}}">
                <button class="btn btn-primary btn-block" type="submit">再登録</button>
            </div>
       
            <div class="col-1">
                <a class="btn btn-secondary btn-block" role="button" href="{{route('teacher.add')}}" >戻る</a>
            </div>
        </div>
</form>
@endsection