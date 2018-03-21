@extends('layouts.main')

@section('content')
<div class="container">
    <h3>以下の内容で登録を完了します。よろしければ「確定」ボタンを押してください。</h3>
    <form action="postEntry" method="post">
        {{ csrf_field() }}
            <table class="table text-center">
                <thead class="bg-light">
                    <tr>
                        <th>期</th>
                        <th scope="col">限</th>
                        <th scope="col">講座名</th>
                        <th scope="col">対象学年</th>
                        <th scope="col">レベル</th>
                        <th scope="col">担当教員</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td>{{ $entry->getTermVal() }}</td>
                            <td>{{ $entry->getTimeVal() }}</td>
                            <td>{{ $entry->title }}</td>
                            <td>{{ $entry->getGradeVal() }}</td>
                            <td>{{ $entry->getLevelVal() }}</td>
                            <td>{{ $entry->getTeacherVal() }}</td>
                        </tr>

                        <input name="entries[]" type="hidden" value="{{$entry->id}}"/>
                    @endforeach
                </tbody>
            </table>
            
            <div class="row justify-content-center">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block" >確定</button>
                </div>
                <div class="col-2">
                    <a class="btn btn-secondary btn-block" role="button" href="{{route('student.entry')}}" >考え直す</a>
                </div>
            </div>
    </form>
</div>
@endsection