@extends('layouts.main')

@section('title','トップページ')
@section('content')
<!--ログイン処理を経ているか否かによって画面表示を切り替える-->
       
<div class="row">
    <!--メニューリスト-->  
    <div class="col-sm-2 order-1" style="height:250px">
        <h6>こんにちは{{$student->first_name}}さん</h6>
        <ul>
            <li><a href="{{route('student.entry')}}">受講講座登録</a></li>
            <li><a href="{{route('student.top')}}">時間割作成</a></li>
        </ul>
    </div>

    <!--講座一覧(userの教科のみ)-->
    <div class="col-sm-10 order-2">
    <div class="row" style="border:solid 1px;border-bottom:none">
        <div class="col">
           時間割
        </div>
        @foreach($times as $time)
            <div class="col"style="border:solid 1px">
                {{$time->value}}限({!! date('G:i',strtotime($time->st_time))!!}~{!! date('G:i',strtotime($time->lst_time)) !!})          
            </div>
        @endforeach
    </div>
    
    @foreach ($terms as $term)
        <div class="row" style="border:solid 1px;border-bottom:none">    
            <div class="col" style="border:solid 1px">
                {{$term->value}}期<br>
                ({!! date('n月j日',strtotime($term->st_day)) !!}<br>
                ~{!! date('n月j日',strtotime($term->lst_day)) !!})
            </div>

            @foreach($times as $time)
               
                    <div class="col"  style="border:solid 1px">
                        <a href="#"class="" data-toggle="modal" data-target='#{{$term.$time}}'>
                            
                        </a>
                        
                    </div> 
               
            @endforeach     
        </div>
        
        
    @endforeach
    {{var_dump($items)}}
    </div>
    
</div>
@endsection