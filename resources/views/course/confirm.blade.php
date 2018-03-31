@extends('layouts.main')

@section('content')
<div class="container">
    <h3>以下の講座を削除します。よろしければ「確定」ボタンを押してください。</h3>
    <form action="postCancel" method="post">
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
                    @foreach($cancels as $cancel)
                        <tr>
                            <td>{{ $cancel->getTermVal() }}</td>
                            <td>{{ $cancel->getTimeVal() }}</td>
                            <td>{{ $cancel->title }}</td>
                            <td>{{ $cancel->getGradeVal() }}</td>
                            <td>{{ $cancel->getLevelVal() }}</td>
                            <td>{{ $cancel->getTeacherVal() }}</td>
                        </tr>

                        <input name="cancelNums[]" type="hidden" value="{{$cancel->id}}"/>
                    @endforeach
                </tbody>
            </table>
            
            <div class="row justify-content-center">
                <div class="col-2">
                    <button type="submit" class="btn btn-danger btn-block" >確定</button>
                </div>
                <div class="col-2">
                    <a class="btn btn-secondary btn-block" role="button" href="{{route('student.entry')}}" >考え直す</a>
                </div>
            </div>
    </form>
</div>
@endsection