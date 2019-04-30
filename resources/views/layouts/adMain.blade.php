<!doctype html>
<html lang="ja">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  </head>
  <body>
    <div id="wrap">
        <nav class="navbar navbar-expand navbar-dark fixed-top d-print-none">
            <a class="navbar-brand" href="{{route('shingaku.top')}}" tabindex="-1">進学講習システム</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <span class="navbar-text ml-auto">
                <a class="nav-item nav-link btn btn-outline-light" href="{{route('shingaku.logout')}}" tabindex="-1">ログアウト</a>
              </span>
            </div>
        </nav>
    

      <div id="contents" class="container-fluid">
        <div class="row">  
          <div class="sidebar col-sm-3 order-1">
            <h5>管理者用メニュー</h5>
            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a class="text-body adminMnue" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
                                テーブル設定
                            </a>
                        </h5>
                    </div><!-- /.card-header -->
                        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="list-group　list-group-flush">
                                <a class="list-group-item list-group-item-action" href="{{route('shingaku.termoption')}}">期間の設定</a>
                                <a class="list-group-item list-group-item-action"  href="{{route('shingaku.timeoption')}}">時限の設定</a>
                                <a class="list-group-item list-group-item-action"  href="{{route('shingaku.gradeoption')}}">学年の設定</a>
                                <a class="list-group-item list-group-item-action"  href="{{route('shingaku.leveloption')}}">レベルの設定</a>
                                <a class="list-group-item list-group-item-action"  href="{{route('shingaku.teacheroption')}}">教員の設定</a>
                                <a class="list-group-item list-group-item-action" href="{{route('shingaku.accountstudents')}}">生徒アカウント設定</a>
                            </div>
                        </div><!-- /.collapse -->
                </div><!-- /.card -->

                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="collapsed text-body adminMnue" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="true" aria-controls="collapseTwo">
                                業務処理
                            </a>
                        </h5>
                    </div><!-- /.card-header -->
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTow" data-parent="#accordion">
                        <div class="list-group　list-group-flush">   
                            <a class="list-group-item list-group-item-action" href="{{route('shingaku.cancellist')}}">不開講講座受講者リスト</a>
                            <a class="list-group-item list-group-item-action" href="{{route('shingaku.feelist')}}">教材費請求リスト</a>
                            <a class="list-group-item list-group-item-action" href="{{route('shingaku.cancellist')}}">教室割作成用CSV出力</a>
                            <a class="list-group-item list-group-item-action" href="{{route('shingaku.cancellist')}}">給与計算</a>
                        </div>
                    </div><!-- /.collapse -->
                </div><!-- /.card -->

        
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                            <a class="collapsed text-body adminMnue" data-toggle="collapse" href="{{route('shingaku.adminoption')}}" role="button" aria-expanded="false" aria-controls="collapseThree">
                            管理者設定
                            </a>
                        </h5>
                    </div>
                </div>
            </div><!-- /#accordion -->
          </div><!-- sidebar -->
          
          <div class="col-sm-9 order-2"><!--ここから右カラム -->
            @yield('content') 
          </div><!-- /ここまで右カラム -->
        </div><!--Row--> 
        
      
      </div><!--Container-fluid-->         
      <footer class="footer text-light d-print-none">
              <small>Copyright © SEIJOGAKKO. All Rights Reserved.</small>
      </footer>
    </div><!-- wrap -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{asset('/js/bootstrap/bootstrap.min.js')}}"></script> 
  </body>
</html>