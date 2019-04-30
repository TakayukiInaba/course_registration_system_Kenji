@extends('layouts.adMain')

@section('title','期間編集')

@section('content')
<div class="container">
 
    <form action="{{url('shingaku/update')}}" method="POST">
    {{ csrf_field() }}

        <div class="form-row">
            <div class="col">
                <label for="value">表示</label>
                {{Form::select('value',$termValue,$TargetTermObj->id,['class' =>'form-control','id'=>'value'])}}
            </div>

            <div class="col">
                <label for="st_month">開始月</label>
                {{Form::select('st_month',$startMonth, date('n',strtotime($TargetTermObj->st_day)),['class' =>'form-control','id'=>'st_month'])}}
            </div>

            <div class="col">
                <label for="st_day">開始日</label>
                {{Form::select('st_day',$startDay, date('j',strtotime($TargetTermObj->st_day)),['class' =>'form-control','id'=>'st_day'])}}
            </div>

            <div class="col">
                <label for="lst_month">終了月</label>
                {{Form::select('lst_month',$lastMonth, date('n',strtotime($TargetTermObj->lst_day)),['class' =>'form-control','id'=>'lst_month'])}}
            </div>

            <div class="col">
                <label for="lst_day">終了日</label>
                {{Form::select('lst_day',$lastDay, date('j',strtotime($TargetTermObj->lst_day)),['class' =>'form-control','id'=>'lst_day'])}}
            </div>

        </div>
        
        <br>
            <div class="row justify-content-end">
                <div class="col-2">
                    <input type="hidden" name="id" value="{{$TargetTermObj->id}}">
                    <button class="btn btn-primary btn-block" type="submit">再登録</button>
                </div>
        
                <div class="col-1">
                    <a class="btn btn-secondary btn-block" role="button" href="{{route('shingaku.termoption')}}" >戻る</a>
                </div>
            </div>
    </form>
</div>
@endsection