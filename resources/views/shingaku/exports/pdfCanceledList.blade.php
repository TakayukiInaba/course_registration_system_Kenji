<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{asset('/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title>Create PDF</title>
    <style>
        body{font-family: ipag;font-size：10px;}
        h1{font-family: ipag;text-align:center; }
        p{word-wrap: break-word;}
    </style>
</head>
<body>
    <h1>不開講講座一覧</h1>
    <p>以下のリストに名前のある生徒で、新たに講座を取り直したいという生徒は、再度Web上にて登録をしなおしてください(無理に再登録を行う必要はありません)。</p> 
    
    <table class="table text-center table-bordered">
            <thead class="bg-light">
                <tr>
                    <th scope="col">学籍番号</th>
                    <th scope="col">生徒氏名</th>
                    <th scope="col">期間</th>
                    <th scope="col">講座名</th>
                    <th scope="col">担当教員</th>
                    <th scope="col">教材費</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ghostEntries as $item)   
                    <tr>
                        <td>{{$item->getStudentId()}}</td>
                        <td>{{$item->getStudentLastName().$item->getStudentName()}}</td>
                        <td>{{$item->getCourseTerm()}}期{{$item->getCourseTime()}}限</td>
                        <td>{{$item->getCourseTitle()}}</td>
                        <td>{{$item->getCourseTeacher()}}</td>
                        <td>￥{!! number_format($item->getCourseFee()) !!}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{asset('/js/bootstrap/bootstrap.min.js')}}"></script> 
</body>