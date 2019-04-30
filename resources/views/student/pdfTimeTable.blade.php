<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="{{asset('/css/bootstrap/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
<title>Create PDF</title>
<style>
body{
font-family: ipag;
font-size：10px;
}
h1{
font-family: ipag;
text-align:center; 
}
</style>
</head>
<body>
    
    <h1>{{$title}}</h1>
    <p>学籍番号:{{$student->username}} 氏名:{{$student->last_name.$student->name}}</p>    
    <div>受講講座</div>
        <table class="table table-sm text-center table-bordered">
            <thead class="bg-light">
                <tr>
                    <th>期間</th>
                    <th scope="col">講座名</th>
                    <th scope="col">対象学年</th>
                    <th scope="col">レベル</th>
                    <th scope="col">担当教員</th>
                    <th scope="col">教材費</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)   
                    <tr>
                        <td>{{$item->getCourseTerm()}}期{{$item->getCourseTime()}}限</td>
                        <td>{{$item->getCourseTitle()}}</td>
                        <td>{{$item->getCourseGrade()}}</td>
                        <td>{{$item->getCourseLevel()}}</td>
                        <td>{{$item->getCourseTeacher()}}</td>
                        <td>￥{!! number_format($item->getCourseFee()) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>※通常の授業と開始時間が異なる場合があります。遅刻しないように注意しましょう。</div>
    <span>→<span>
    @foreach($times as $time)
        <span> {{$time->value}}限({!! date('G:i',strtotime($time->st_time))!!}～{!! date('G:i',strtotime($time->lst_time)) !!})</div>
    @endforeach   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{asset('/js/bootstrap/bootstrap.min.js')}}"></script> 
</body>