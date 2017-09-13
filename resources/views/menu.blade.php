<html lang="pt-br">
    <head>
        <title>CeTIC - @yield('title')</title>
        <meta charset="utf-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap.min.css') }} >
        <link rel="stylesheet" type="text/css" href={{ asset('css/style.css') }} >

    </head>
    <body>
         <!-- navbar -->
         <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">CeTIC</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">WEB
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href={{ route('sistema') }} >Sistemas</a></li>
                          <li><a href="#">Sites</a></li>
                        </ul>
                    </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>
                </div>
              </div>
         </nav>
         <!-- /navbar  -->

        <div class="container">
            @yield('content')
        </div>

        <!-- navbar rodape -->

         <nav class="navbar navbar-inverse navbar-fixed-bottom">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">CeTIC</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Page 1</a></li>
                  <li><a href="#">Page 2</a></li>
                  <li><a href="#">Page 3</a></li>
                </ul>
              </div>
         </nav> 

        <!-- /navbar rodape -->

        <script type="text/javascript" src={{ asset('js/jquery.js') }} ></script>
        <script type="text/javascript" src={{ asset('js/bootstrap.min.js') }} ></script>
    </body>
</html>