@extends('layouts.main')

@section('title','新規講座登録')

@section('content')

 <!-- バリデーションエラー時の表示-->
 <!-- バリデーションルールはAddRequestにある-->
<!--<div class="container">-->
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


<!--formの設定についてはApp\couposers\formcomposerを参照せよ。-->
<form action="{{url('add')}}" method="POST">
{{ csrf_field() }}

    <div class="form-row">
            <div class="col-1">
            <label for="term_id">期</label>
            {{Form::select('term_id',$optTerms,old('term_id'),['class' =>'form-control','id'=>'term_id'])}}
            </div>

            <div class="col-1">
            <label for="time_id">限</label>
            {{Form::select('time_id',$optTimes,old('time_id'),['class' =>'form-control','id'=>'time_id'])}}
            </div>

            <div class="col-1">
            <label for="subject_id">教科</label>
            {{Form::select('subject_id',$optSbj,old('subject_id'),['class' =>'form-control','id'=>'subject_id','tabindex'=>'-1'])}}
            </div>
            
            <div class="col-2">
            <label for="grade_id">学年</label>
            {{Form::select('grade_id',$optGrades,old('grade_id'),['class' =>'form-control','id'=>'grade_id'])}}
            </div>
            
            <div class="col-1">
            <label for="level_id">レベル</label>
            {{Form::select('level_id',$optLevels,old('level_id'),['class'=>'form-control','id'=>'level_id'])}}
            </div>
            
            <div class="col-3">
            <label for="title">講座名</label>
            <input class="form-control" type="text" id="title" name="title" value="{{old('title')}}">
            </div>
            

            <div class="col-2">
            <label for="teacher_id">担当教員</label>
            {{Form::select('teacher_id',$optTeachers,old('teacher_id'),['class'=>'form-control','id'=>'teacher_id'])}}
            </div>

            <div class="col-1">
            <label for="fee">教材費</label>
                    <input class="form-control" type="text" id="fee" value="0" name="fee">
            </div>
        </div>

    <div class="form-row">
        <div class="col-12">
            <label for="summary">概要</label>
            <textarea class="form-control" id="content" rows="3" name="summary">{{old('summary')}}</textarea>
        </div>
    </div>
    <br>
        <div class="row justify-content-end">
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block" >登録</button>
            </div>
       
            <div class="col-1">
                <a class="btn btn-secondary btn-block" role="button" href="/laravelapp/public/course" >戻る</a>
            </div>
        </div>
</form>
<!--</div>-->

<table class="table table-hover ">
    <thead class="thead-light">
        <tr>
            <th>期間</th>
            <th>教科</th>
            <th>学年</th>
            <th>レベル</th>
            <th>講座名</th>
            <th>担当</th>
            <th>教材費</th>
            <th>概要</th>
            <th>修正</th>
        </tr>
    </thead>

    <tbody>
        @if ($items->count() > 0)
            @foreach ($items as $item)
                <tr>
                    <td>{{$item->getTermVal()}}期{{$item->getTimeVal()}}限</td>
                    <td>{{$item->getSbjVal()}}</td>
                    <td>{{$item->getGradeVal()}}</td>
                    <td>{{$item->getLevelVal()}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->getTeacherVal()}}</td>
                    <td>￥{{$item->fee}}</td>
                    <td>
                        <button class="btn btn-default" data-toggle="modal" data-target="#{{$item->title}}">
                            概要
                        </button>
                        <!--概要ボタンの内容作成(モーダルの呼び出し) -->
                        @include('components.modal',['summary'=>'{{$item->summary}}','title'=>"{{$item->title}}"])
                    </td>

                        <!--editアクションの呼び出し「$item->id」に講座情報を込める-->
                    <td>
                        <a class="btn btn-info" href="{{url('edit/'.$item->id)}}" role="button">修正</a>
                    </td>
               
                </tr>
            @endforeach
        @else
            </tbody>
            </table>
            <h2 class="text-center">登録されている講座はありません。</h2>
        @endif
    </tbody>
</table>
@endsection