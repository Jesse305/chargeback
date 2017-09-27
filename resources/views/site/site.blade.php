@extends('menu')
@section('title', 'Detalhes Site')

@section('content')

<div class="container" style="margin-top: 60px; margin-botton: 60px">
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
  </table>
  <!-- fim tabela -->

</div>

@endsection
