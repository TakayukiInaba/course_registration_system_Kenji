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
            <a class="navbar-brand" href="{{route('student.top')}}" tabindex="-1">進学講習システム</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <span class="navbar-text ml-auto">
                <a class="nav-item nav-link btn btn-outline-light" href="{{route('student.logout')}}" tabindex="-1">ログアウト</a>
              </span>
            </div>
        </nav>
    

      <div id="contents" class="container-fluid">
        <div style="min-width:900px">
          @yield('content')
        </div>
      </div>
                
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