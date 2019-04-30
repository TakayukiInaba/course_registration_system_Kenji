@extends('layouts.adMain')

@section('title','テーブル設定')

@section('content')
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <h3>「教員」テーブル<h3>
    </div>
   
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <label for="value">姓</label>
                        <input type="text" class="form-control" id="value" name="value" required>
                </div>
                <div class="col">
                    <label for="name">名</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                </div>
               
                <div class="col">
                    <label for="subject_id">教科</label>
                        <select class="form-control" id="subject_id" name="subject_id" required>
                            <option value="">以下より選択</option>
                            @foreach($subjects as $sbj)
                                <option value="$sbj->id">{{$sbj->value}}</option>
                            @endforeach
                        </select>      
                </div>

                 <div class="col">
                    <label for="position_id">役職</label>
                        <select class="form-control" id="position_id" name="position_id" required>
                            <option value="">以下より選択</option>
                            @foreach($positions as $posi)
                                <option value="$posi->id">{{$posi->value}}</option>
                            @endforeach
                        </select>      
                </div>

                <div class="col">
                    <label for="email">ID</label>
                        <input id="email" type="email" class="form-control" name="email" required>
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
                            <th>姓</th>
                            <th>名</th>
                            <th>教科</th>
                            <th>役職</th>
                            <th>ID</th>
                            <th>修正</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($teachers->count() > 0)
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{$teacher->value}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->getSubjectVal()}}</td>
                                    <td>{{$teacher->getPositionVal()}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td><a class="btn btn-info" href="{{url('shingaku/editteacher/'.$teacher->id)}}" role="button">修正</a></td>
                                    <td><a class="btn btn-danger" href="{{url('shingaku/deleteteacher/'.$teacher->id)}}" role="button">削除</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            　　</table>
        </div>
</div>
@endsection