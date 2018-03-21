@extends('layouts.main')

@section('title','時間割表')

@section('content')



@foreach ($terms as $term)
    <div class="row" style="border:solid 1px;border-bottom:none">
        <div class="col-12 text-center bg-light " style="padding:0px;">
            {{$term->value}}期  ({!! date('n月j日',strtotime($term->st_day)) !!}~{!! date('n月j日',strtotime($term->lst_day)) !!})
        </div>
    </div>
    <div class="row">
        @foreach ($times as $time)
            <div class="col-3" style="padding:0px; border:solid 0.5px;">
                <table class="table" style="font-size:8px;">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center"style="border-bottom:double;font-size:12px;padding:0px"colspan="4">
                                {{$time->value}}限({!! date('G:i',strtotime($time->st_time))!!}~{!! date('G:i',strtotime($time->lst_time)) !!})
                            </th>
                        </tr>
                        <tr style="border-bottom:double;border-top:double;">
                            <th style="padding:0px 5px;">学年</th>
                            <th style="padding:0px 5px;">レベル</th>
                            <th style="padding:0px 5px;">講座名</th>
                            <th style="padding:0px 5px;">担当</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items[$term->id.$time->id] as $obj)
                            <tr>                        
                                <td style="padding:5px 5px;">{{$obj->getGradeVal()}}</td>
                                <td style="padding:5px 5px;">{{$obj->getLevelVal()}}</td>
                                <td style="padding:5px 5px;">{{$obj->title}}</td>
                                <td style="padding:5px 5px;">{{$obj->getTeacherVal()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endforeach
@endsection