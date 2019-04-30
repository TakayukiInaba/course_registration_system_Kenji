@extends('layouts.adMain')

@section('title','テーブル設定')

@section('content')
<div class="container">
    <div class="row">
        <h3>「レベル」レコードの修正<h3>
    </div>
        <form method="POST" action="{{url('shingaku/updatelevel')}}">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <label for="value">表示</label>
                        <input type="text" class="form-control" id="value" name="value" value='{{@$TargetLevelObj->value}}'>
                </div>
            </div>
                <br>
            <div class="form-row justify-content-end">
                <div class="col-2">      
                    <input type="hidden" name="id" value="{{$TargetLevelObj->id}}">  
                    <button type="submit" class="btn btn-primary btn-block" >登録</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection