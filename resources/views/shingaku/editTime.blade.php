@extends('layouts.adMain')

@section('title','期間編集')

@section('content')
<div class="container">
 
    <form action="{{url('shingaku/updatetime')}}" method="POST">
    {{ csrf_field() }}

        <div class="form-row">
            <div class="col">
                <label for="value">表示</label>
                {{Form::select('value',$timeValue,$TargetTimeObj->id,['class' =>'form-control','id'=>'value'])}}
            </div>

            <div class="col">
                <label for="st_hour">開始時間</label>
                {{Form::select('st_hour',$startHours, date('G',strtotime($TargetTimeObj->st_time)),['class' =>'form-control','id'=>'st_hour'])}}
            </div>

            <div class="col">
                <label for="st_min">開始時間(分)</label>
                {{Form::select('st_min',$startMinutes, date('i',strtotime($TargetTimeObj->st_time)),['class' =>'form-control','id'=>'st_min'])}}
            </div>

            <div class="col">
                <label for="lst_hour">終了時間</label>
                {{Form::select('lst_hour',$lastHours, date('G',strtotime($TargetTimeObj->lst_time)),['class' =>'form-control','id'=>'lst_hour'])}}
            </div>

            <div class="col">
                <label for="lst_min">終了時間(分)</label>
                {{Form::select('lst_min',$lastMinutes, date('i',strtotime($TargetTimeObj->lst_time)),['class' =>'form-control','id'=>'lst_min'])}}
            </div>

        </div>
        
        <br>
            <div class="row justify-content-end">
                <div class="col-2">
                    <input type="hidden" name="id" value="{{$TargetTimeObj->id}}">
                    <button class="btn btn-primary btn-block" type="submit">再登録</button>
                </div>
        
                <div class="col-1">
                    <a class="btn btn-secondary btn-block" role="button" href="{{route('shingaku.timeoption')}}" >戻る</a>
                </div>
            </div>
    </form>
</div>
@endsection