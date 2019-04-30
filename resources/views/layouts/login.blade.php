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
      <!-- ナブバー設定 -->
      @yield('navbar')

      <div id="contents" class="container-fluid">
          @yield('content')
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