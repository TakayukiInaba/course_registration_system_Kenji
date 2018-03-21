@extends('layouts.main')

@section('title','時間割作成')

@section('content')

<div class="container" >
    <div class="col-md-6 offset-3">
        <!--formの設定についてはApp\couposers\TableComposerを参照せよ。-->
        <form action="/laravelapp/public/table" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group row">
                <label for="subject_id" class="col-sm-2 col-form-label">教科</label>
                <div class="col-sm-8">
                    {{Form::select('subject_id',$optSbjs,old('subject_id'),['class' =>'form-control','id'=>'subject_id'])}}
                </div>
            </div>

            <div class="form-group row">
                <label for="grade_id" class="col-sm-2 col-form-label">学年</label>
                <div class="col-sm-8">
                    {{Form::select('grade_id',$optGrades,old('grade_id'),['class' =>'form-control','id'=>'grade_id'])}}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-5 offset-2">
                    <button type="submit" class="btn btn-primary btn-block" >作成</button>
                </div>
                <div class="col-sm-3">   
                    <a class="btn btn-secondary btn-block" role="button" href="/laravelapp/public/course" >戻る</a>
                </div>
            </div>
        
        </form>
            <h5 class="text-center">条件を設定し「作成」ボタンを押してください。</h5>
    </div>
</div>       
@endsection