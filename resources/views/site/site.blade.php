@extends('menu')
@section('title', 'Detalhes Site')

@section('content')

<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Detalhes Site</h4>
      </div>
    </div>
  </div>
  <!-- fim painel -->

  <!-- tabela -->
  <table class="table table-bordered table-striped table-hover">
    <tr>
      <td colspan="2"><h4><font color="#000080">Dados do Solicitante</font></h4></td>
    </tr>
    <tr>
      <td><b>Órgão:</b>
        @if($orgao)
        {{$orgao->no_orgao}}
        @else
        Informação não cadastrada
        @endif
      </td>
      <td><b>Unidade:</b>
        @if($unidade)
        {{$unidade->no_unidade}}
        @else
        Informação não cadastrada.
        @endif
      </td>
    </tr>
    <tr>
      <td colspan="2"><h5><font color="#000080">Responsavel(eis)</font></h5></td>
    </tr>
    @if(isset($responsaveis) && sizeof($responsaveis) > 0)
      @foreach($responsaveis as $resps)
      <tr>
        <td><b>Nome:</b> {{$resps->no_responsavel}}</td>
        <td><b>Telefone:</b> {{$resps->nu_telefone}}
          <div class="pull-right">
            <a href="{{route('responsavel.detalha', $resps->id)}}" class="btn btn-info btn-sm" title="visualizar cadastro" >
              <i class="glyphicon glyphicon-eye-open"></i>
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    @else
    <tr>
      <td colspan="2">Não existe responsavel vinculado.</td>
    </tr>
    @endif
    <tr>
      <td colspan="2"><h4><font color="#000080">Dados Site</font></h4></td>
    </tr>
    <tr>
      <td><b>Nome:</b> {{$site->no_site}}</td>
      <td><b>End. Web:</b> <a href="http://{{$site->ds_website}}">{{$site->ds_website}}</a></td>
    </tr>
    <tr>
      <td><b>Caminho Servidor:</b> {{$site->ip_html}}</td>
      <td><b>Tipo Site:</b>
        @if($site->tp_portal == 'RA')
        Região Administrativa.
        {{$site->tp_portal}}
        @endif
      </td>
    </tr>
    <tr>
      <td><b>End. Publicador:</b> <a href="http://{{$site->no_dns}}">{{$site->no_dns}}</a></td>
      <td><b>Token de acesso?</b> {{$site->st_token}} </td>
    </tr>
    <tr>
      <td><b>Data Cadastro:</b> {{$site->dt_cadastro}}</td>
      <td><b>Data Atualização:</b> {{$site->dt_atualizacao}}</td>
    </tr>
    <tr>
      <td colspan="2"><h4><font color="#000080">Dados Google Analytics</font></h4></td>
    </tr>
    <tr>
      <td><b>Usuário:</b> {{$site->usuario_analytics}} </td>
      <td>
        <div class="input-group">
          <span class="input-group-addon">Senha:</span>
          <input class="form-control senha" type="password" name="" value="{{$site->senha_analytics}}">
          <span class="input-group-addon">
            <button class="btn btn-xs revela_senha"><i class="glyphicon glyphicon-eye-open" onclick="return false;"></i></button>
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2"><b>Código</b> {{$site->codigo_analytics}}</td>
    </tr>
    <tr>
      <td colspan="2"><b><h4><font color="#000080">Dados Banco de Dados</font></h4></b></td>
    </tr>
    <tr>
      <td><b>IP:</b> {{$site->ip_banco}}</td>
      <td><b>Schema:</b> {{$site->esquema_banco}}</td>
    </tr>
    <tr>
      <td><b>Usuário:</b> {{$site->usuario_banco}}</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon">Senha:</span>
          <input class="form-control senha" type="password" name="" value="{{$site->pwd_banco}}">
          <span class="input-group-addon">
            <button class="btn btn-xs revela_senha"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2"><b>Prefixo da Tabela:</b> {{$site->prefixo_tabela}}</td>
    </tr>
  </table>
  <!-- fim tabela -->
  <div class="text-right">
    <a href="javascript:history.back();" class="btn btn-success btn-sm" title="voltar"><i class="glyphicon glyphicon-arrow-left"></i></a>
  </div>

</div>
<!-- fim container -->

@endsection
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/site.js')}}"></script>
