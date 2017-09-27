@extends('menu')
@section('title', 'Detalhes Site')

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
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
        @if(sizeof($orgao) > 0)
        {{$orgao[0]->no_orgao}}
        @else
        Informação não cadastrada
        @endif
      </td>
      <td><b>Unidade:</b>
        @if(sizeof($unidade))
        {{$unidade[0]->no_unidade}}
        @else
        Informação não cadastrada.
        @endif
      </td>
    </tr>
    <tr>
      <td colspan="2"><h5><font color="#000080">Responsavel(eis)</font></h5></td>
    </tr>
    @if(isset($responsaveis))
      @foreach($responsaveis as $resps)
      <tr>
        <td><b>Nome:</b> {{$resps->no_responsavel}}</td>
        <td><b>Telefone:</b> {{$resps->nu_telefone}}</td>
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
      <td><b>Nome:</b> {{$site[0]->no_site}}</td>
      <td><b>End. Web:</b> <a href="http://{{$site[0]->ds_website}}">{{$site[0]->ds_website}}</a></td>
    </tr>
    <tr>
      <td><b>Caminho Servidor:</b> {{$site[0]->ip_html}}</td>
      <td><b>Tipo Site:</b>
        @if($site[0]->tp_portal == 'RA')
        Região Administrativa.
        @else
        {{$site[0]->tp_portal}}
        @endif
      </td>
    </tr>
    <tr>
      <td><b>End. Publicador:</b> <a href="http://{{$site[0]->no_dns}}">{{$site[0]->no_dns}}</a></td>
      <td><b>Token de acesso?</b> {{$site[0]->st_token}} </td>
    </tr>
    <tr>
      <td colspan="2"><h4><font color="#000080">Dados Google Analytics</font></h4></td>
    </tr>
    <tr>
      <td><b>Usuário:</b> {{$site[0]->usuario_analytics}} </td>
      <td>
        <div class="input-group">
          <span class="input-group-addon">Senha:</span>
          <input class="form-control senha" type="password" name="" value="{{$site[0]->senha_analytics}}">
          <span class="input-group-addon">
            <button class="btn btn-xs revela_senha"><i class="glyphicon glyphicon-eye-open" onclick="return false;"></i></button>
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2"><b>Código</b> {{$site[0]->codigo_analytics}}</td>
    </tr>
    <tr>
      <td colspan="2"><b><h4><font color="#000080">Dados Banco de Dados</font></h4></b></td>
    </tr>
    <tr>
      <td><b>IP:</b> {{$site[0]->ip_banco}}</td>
      <td><b>Schema:</b> {{$site[0]->esquema_banco}}</td>
    </tr>
    <tr>
      <td><b>Usuário:</b> {{$site[0]->usuario_banco}}</td>
      <td>
        <div class="input-group">
          <span class="input-group-addon">Senha:</span>
          <input class="form-control senha" type="password" name="" value="{{$site[0]->pwd_banco}}">
          <span class="input-group-addon">
            <button class="btn btn-xs revela_senha"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2"><b>Prefixo da Tabela:</b> {{$site[0]->prefixo_tabela}}</td>
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
