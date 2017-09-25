@extends('menu')
@section('title', 'Altera Responsavel')
<style media="screen">
  .input-group {
    margin-bottom: 5px;
  }
</style>
@section('content')
<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Altera Responsavel</h4>
      </div>
    </div>
  </div>
  <!-- fim painel -->
  <form class="" id="form_resp" action="" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">Órgão:</span>
          <input class="form-control" type="text" name="" value="{{$orgao[0]->no_orgao}}" readonly>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">Unidade:</span>
          <input class="form-control" type="text" name="" value="{{$unidade[0]->no_unidade}}" readonly>
        </div>
      </div>
    </div>
  </form>

</div>
<!-- fim container -->
@endsection
