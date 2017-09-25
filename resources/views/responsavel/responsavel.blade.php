@extends('menu')
@section('title', 'Detalhes Responsavel')

@section('content')
<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Detalhes Responsável</h4>
      </div>
    </div>
  </div>
  <!-- fim painel -->

  <!-- tabela -->
  <table class="table table-striped table-bordered table-hover">
    <tr>
      <td><b>Órgão:</b> {{$orgao[0]->no_orgao}}</td>
      <td><b>Órgão:</b> {{$unidade[0]->no_unidade}}</td>
    </tr>
    <tr>
      <td colspan="2"><b>Nome:</b> {{$responsavel[0]->no_responsavel}}</td>
    </tr>
    <tr>
      <td><b>Telefone:</b> {{$responsavel[0]->nu_telefone}}</td>
      <td><b>Celular:</b> {{$responsavel[0]->nu_celular}}</td>
    </tr>
    <tr>
      <td><b>E-mail:</b> {{$responsavel[0]->no_email}}</td>
      <td><b>Status:</b>
        @if($responsavel[0]->status == 1)
        Ativo
        @else
        Inativo
        @endif
      </td>
    </tr>
    <tr>
      <td><b>Data Cadastro: </b> {{$responsavel[0]->dt_cadastro}}</td>
      <td><b>Data Atulização:</b>
        @if($responsavel[0]->dt_atualizacao)
        {{$responsavel[0]->dt_atualizacao}}
        @else
        Nunca Atualizado.
        @endif
      </td>
    </tr>
    <tr>
      <td colspan="2"><b>Observações:</b>
        @if($responsavel[0]->ds_observacao)
        {{$responsavel[0]->ds_observacao}}
        @else
        Sem observações.
        @endif
      </td>
    </tr>
  </table>
  <!-- fim tabela -->
  <div class="text-right">
    <a href="javascript:history.back();" class="btn btn-success btn-sm"  title="voltar">
      <i class="glyphicon glyphicon-arrow-left"></i>
    </a>
  </div>
</div>
<!-- fim container -->
@endsection
