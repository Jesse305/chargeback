@extends('menu')
@section('title', 'Detalhes Responsavel')

@section('content')
<div class="container">
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
      <td><b>Órgão:</b> {{$orgao->no_orgao}}</td>
      <td><b>Unidade:</b> {{$unidade->no_unidade}}</td>
    </tr>
    <tr>
      <td colspan="2"><b>Nome:</b> {{$responsavel->no_responsavel}}</td>
    </tr>
    <tr>
      <td><b>Telefone:</b> {{$responsavel->nu_telefone}}</td>
      <td><b>Celular:</b> {{$responsavel->nu_celular}}</td>
    </tr>
    <tr>
      <td><b>E-mail:</b> {{$responsavel->no_email}}</td>
      <td><b>Status:</b>
        @if($responsavel->status == 1)
        Ativo
        @else
        Inativo
        @endif
      </td>
    </tr>
    <tr>
      <td><b>Data Cadastro: </b> {{$responsavel->dt_cadastro}}</td>
      <td><b>Data Atulização:</b>
        @if($responsavel->dt_atualizacao)
        {{$responsavel->dt_atualizacao}}
        @else
        Nunca Atualizado.
        @endif
      </td>
    </tr>
    <tr>
      <td colspan="2"><b>Observações:</b>
        @if($responsavel->ds_observacao)
        {{$responsavel->ds_observacao}}
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
