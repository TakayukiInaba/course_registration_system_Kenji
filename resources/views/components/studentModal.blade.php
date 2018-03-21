<!-- モーダルの設定 -->
<div class="modal fade" id="{{$term->id.$time->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$entries[$term->id.$time->id]["title"]}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($entries[$term->id.$time->id]["title"] == "登録なし")
          <p>この時期で講座を受講したい場合は、下の「登録更新」ボタンをおしてください。↓</p>
        @else
          <p>対象生徒：{{$entries[$term->id.$time->id]["grade"]}} {{$entries[$term->id.$time->id]["level"]}}<br>
          担当教員：{{$entries[$term->id.$time->id]["teacher"]}}先生<br>
          教材費用：{{$entries[$term->id.$time->id]["fee"]}}円</p>
          <p>{{$entries[$term->id.$time->id]["summary"]}}</p>
        @endif
      </div>

      <div class="modal-footer">
      　<a href="{{url('student/entry/'.$term->id.'/'.$time->id.'/'.$entries[$term->id.$time->id]['id'])}}"class="btn btn-primary">登録更新</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->