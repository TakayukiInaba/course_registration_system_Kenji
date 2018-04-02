@extends('layouts.main')

@section('title','トップページ')
@section('content')
<!--ログイン処理を経ているか否かによって画面表示を切り替える-->
       
<div class="row">
    <!--メニューリスト--> 
    <div class="sidebar col-sm-2 order-1">
        <h6>こんにちは{{$student->first_name}}さん。</h6>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{route('student.entry')}}">受講講座登録</a>
            <a class="list-group-item list-group-item-action"  href="{{route('student.top')}}">時間割作成</a>
        </div>
    </div>

    <div class="col-sm-10 order-2">
    <!--時間割の表示-->
    <div class="student-top-table">
        <div class="row  border border-dark">
            <div class="col-1 text-center">
                時間割
            </div>
            @foreach($times as $time)
                <div class="col border border-bottom-0 border-top-0  border-right-0 border-dark text-center">
                    {{$time->value}}限({!! date('G:i',strtotime($time->st_time))!!}~{!! date('G:i',strtotime($time->lst_time)) !!})          
                </div>
            @endforeach
        </div>
    
        @foreach ($terms as $term)
            <div class="row border border-top-0 border-dark">    
                <div class="col-1 text-center">
                    {{$term->value}}期<br>
                    {!! date('n月j日',strtotime($term->st_day)) !!}<br>
                    ~{!! date('n月j日',strtotime($term->lst_day)) !!}
                </div>

                @foreach($times as $time)
                    <div class="col border border-bottom-0 border-top-0  border-right-0 border-dark link-block">
                        <a href="#"class="" data-toggle="modal" data-target='#{{$term->id.$time->id}}'>
                            {{ $entries[$term->id.$time->id]["title"] }}
                        </a>
                    </div>
                    @include('components.studentModal')
                @endforeach     
            </div>
        @endforeach
    </div>
    </div>
</div>
@endsection