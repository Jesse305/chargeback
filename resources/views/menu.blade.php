<html lang="pt-br">
    <head>
        <title>CeTIC - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap.min.css') }} >
        <link rel="stylesheet" type="text/css" href={{ asset('css/style.css') }} >
        <link rel="stylesheet" type="text/css" href={{ asset('data_table/css/dataTables.bootstrap.min.css') }} >

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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servidores
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href={{ route('servidores_vm') }} >VMs</a></li>
                        </ul>                      
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">WEB
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href={{ route('sistemas') }} >Sistemas</a></li>
                          <li><a href={{ route('sites') }} >Sites</a></li>
                        </ul>
                    </li>
                    <!-- fim dropdown web -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="pré cadastro para sistemas">Pré Cadastro
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href={{route('ambientes')}}>Ambiente</a></li>
                          <li><a href={{ route('bancos') }}>Banco de Dados</a></li>
                          <li><a href={{ route('desenvolvedores') }}>Desenvolvedores</a></li>
                          <li><a href={{ route('frameworks') }}>Frameworks</a></li>
                        </ul>
                    </li>
                    <!-- fim dropdown pré cadastro -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administração
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href= {{route('orgaos')}}>Órgãos</a></li>
                          <li><a href= {{route('unidades')}}>Unidades</a></li>
                          <li><a href={{route('responsaveis')}}>Responsáveis</a></li>
                          <li><a href={{route('itens_config')}}>Itens Configuração</a></li>
                        </ul>
                    </li>


                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastre-se </a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                  </ul>
                </div>
              </div>
         </nav>
         <!-- /navbar  -->

        <div class="container" style="margin-top: 60px; margin-bottom: 60px;">
          @yield('content')
        </div>

        <script type="text/javascript" src={{ asset('js/jquery.js') }} ></script>
        <script type="text/javascript" src={{ asset('js/bootstrap.min.js') }} ></script>
        <script type="text/javascript" src={{ asset('data_table/js/jquery.dataTables.min.js') }} ></script>
        <script type="text/javascript" src={{ asset('data_table/js/dataTables.bootstrap.min.js') }} ></script>
    </body>
</html>
