@extends('layouts.main')

@section('title','時間割表')

@section('content')
    <div class="row border border-dark">
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
        <div class="row  border border-top-0 border-dark">    
            <div class="col-1 text-center">
                {{$term->value}}期<br>
                {!! date('n月j日',strtotime($term->st_day)) !!}<br>
                ≀<br>
                {!! date('n月j日',strtotime($term->lst_day)) !!}
            </div>

            @foreach($times as $time)
                <div class="col border border-bottom-0 border-top-0  border-right-0 border-dark covering-table">
                    <table class="table table-inthe-box">
                        <thead>
                            <tr>
                                <th>学年</th>
                                <th>レベル</th>
                                <th>講座名</th>
                                <th>担当</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items[$term->id.$time->id] as $obj)
                                <tr>                        
                                    <td>{{$obj->getGradeVal()}}</td>
                                    <td>{{$obj->getLevelVal()}}</td>
                                    <td>{{$obj->title}}</td>
                                    <td>{{$obj->getTeacherVal()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach     
        </div>
    @endforeach
@endsection