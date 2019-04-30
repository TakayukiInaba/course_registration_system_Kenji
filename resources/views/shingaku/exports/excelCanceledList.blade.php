<!DOCTYPE html>
<html>
<table>
    <thead>
        <tr>
            <th>学籍番号</th>
            <th>生徒氏名</th>
            <th>期間</th>
            <th>講座名</th>
            <th>担当教員</th>
            <th>教材費</th>
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
</html>