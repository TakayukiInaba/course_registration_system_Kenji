@extends('layouts.main')

@section('title','名簿表示')
@section('content')
<div class="container-fluid">
    <form method="post">
    {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <table class="table  table-hover table-sm">
                    <thead class="thead-light">
                    <tr>
                    <th>チェック</th>
                    <th>期間</th>
                    <th>教科</th>
                    <th>学年</th>
                    <th>レベル</th>
                    <th>講座名</th>
                    <th>担当</th>
                    <th>人数</th>
                    <th>名簿表示</th>
                </tr>
            </thead>
            <tbody>
               
                    @if ($items->count() > 0)
                        @foreach ($items as $item)
                            <tr>
                                <div class="form-check">
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="cancelnums[]" value="{{$item->id}}" id="{{$item->id}}"></td>
                                    <td><label class="form-check-label" for="{{$item->id}}">{{$item->getTermVal()}}期{{$item->getTimeVal()}}限</label></td>
                                    <td><label class="form-check-label" for="{{$item->id}}">{{$item->getSbjVal()}}</label></td>
                                    <td><label class="form-check-label" for="{{$item->id}}">{{$item->getGradeVal()}}</label></td>
                                    <td><label class="form-check-label" for="{{$item->id}}">{{$item->getLevelVal()}}</label></td>
                                    <td><label class="form-check-label" for="{{$item->id}}">{{$item->title}}</label></td>
                                    <td><label class="form-check-label" for="{{$item->id}}">{{$item->getTeacherVal()}}</label></td>
                                    <td><label class="form-check-label" for="{{$item->id}}">{{$item->entries_count}}人</label></td>
                                    <td>
                                        <a class="btn btn-secondary btn-block" role="button" href="{{url('list/'.$item->id)}}" >表示</a>
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    @else
                        </tbody>
                        </table>
                        <h2 class="text-center">登録されている講座はありません。</h2>
                    @endif
                </form>
            </tbody>
        </table>
        </div>
        </div>
        <div class='row justify-content-center'>
            <div class="col-2">
                <button type="submit" class="btn btn-danger btn-block" >削除する</button>
            </div>
            <div class="col-2">
                <a class="btn btn-secondary btn-block" role="button" href="{{route('/')}}" >戻る</a>
            </div>
        </div>
    </form>
</div>
@endsection