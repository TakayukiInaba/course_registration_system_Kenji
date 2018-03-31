@extends('layouts.main')

@section('content')
<div  class="container-fluid">
    <form  method="POST">
    {{ csrf_field() }}
        <table class="table table-hover table-sm text-center">
            <thead class="bg-light">
                <tr>
                    <th colspan="6">
                        {{$term->value}}期({!! date('n月j日',strtotime($term->st_day)) !!}~{!! date('n月j日',strtotime($term->lst_day)) !!})
                        {{$time->value}}限({!! date('G:i',strtotime($time->st_time))!!}~{!! date('G:i',strtotime($time->lst_time)) !!})
                    </th>
                </tr>
                <tr>
                    <th>受講</th>
                    <th scope="col">講座名</th>
                    <th scope="col">対象学年</th>
                    <th scope="col">レベル</th>
                    <th scope="col">担当教員</th>
                    <th scope="col">概要</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <div class="form-check">
                            <td>
                                <input class="form-check-input" id="0" type="radio" name="entry" value="0" @if($id=='0') checked="checked" disabled @endif >
                            </td>
                            <td colspan="5">
                                <label class="form-check-label" for="0">
                                    ☜この期間に講座を受講しない場合は、左のチェックを入れてください。
                                </label>
                            </td>
                        </div>
                    </tr>

                @foreach($items as $item)
                    <tr>
                        <div class="form-check">
                            <td>
                                <input class="form-check-input" id="{{$item->id}}" type="radio" name="entry" value="{{ $item->id }}" @if($item->id==$id)checked="checked"@endif>
                            </td>
                            <td><label class="form-check-label" for="{{$item->id}}">{{ $item->title}}</label></td>
                            <td><label class="form-check-label" for="{{$item->id}}">{{ $item->getGradeVal() }}</lavel></td>
                            <td><label class="form-check-label" for="{{$item->id}}">{{ $item->getLevelVal() }}</lavel></td>
                            <td><label class="form-check-label" for="{{$item->id}}">{{ $item->getTeacherVal() }}</lavel></td>
                        
                        </div>
                        <td>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#{{$item->title}}">
                                概要
                            </button>
                            <!--概要ボタンの内容作成(モーダルの呼び出し) -->
                            @include('components.modal',['summary'=>'{{$item->summary}}','title'=>"{{$item->title}}"])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <input type="hidden" name="entryTerm" value="{{$term->id}}"/>
        <input type="hidden" name="entryTime" value="{{$time->id}}"/>

        <div class="row justify-content-center ">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block" >登録</button>
                </div>
                <div class="col-2">
                    <a class="btn btn-secondary btn-block" role="button" href="{{route('student.top')}}" >戻る</a>
                </div>
            </div>
    </form>
</div>
@endsection