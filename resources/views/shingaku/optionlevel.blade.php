@extends('layouts.adMain')

@section('title','テーブル設定')

@section('content')
<div class="container">
    <div class="row">
        <h3>「レベル」テーブル<h3>
    </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <label for="value">表示</label>
                        <input type="text" class="form-control" id="value" name="value">
                </div>
            </div>
            <br>
                <div class="form-row justify-content-end">
                    <div class="col-2">        
                        <button type="submit" class="btn btn-primary btn-block" >登録</button>
                    </div>
                </div>
            
        </form>
  
        <div class="row">
                <table class="table table-hover ">
                    <thead class="thead-light">
                        <tr>
                            <th>表示</th>
                            <th>修正</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($levels->count() > 0)
                            @foreach ($levels as $level)
                                <tr>
                                    <td>{{$level->value}}</td>
                                    <td><a class="btn btn-info" href="{{url('shingaku/editlevel/'.$level->id)}}" role="button">修正</a></td>
                                    <td><a class="btn btn-danger" href="{{url('shingaku/deletelevel/'.$level->id)}}" role="button">削除</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            　　</table>
        </div>
</div>
@endsection