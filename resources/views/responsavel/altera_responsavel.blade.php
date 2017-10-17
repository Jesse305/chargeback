@extends('menu')
@section('title', 'Altera Responsavel')
<style media="screen">
  .input-group {
    margin-bottom: 5px;
  }
</style>
@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Altera Responsavel</h4>
      </div>
    </div>
  </div>
  <!-- fim painel -->
  <form class="" id="form_resp" action={{route('responsavel.atualizar', $responsavel->id)}} method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">Órgão:</span>
          <input class="form-control" type="text" name="" value="{{$orgao->no_orgao}}" readonly>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">Unidade:</span>
          <input class="form-control" type="text" name="" value="{{$unidade->no_unidade}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">Nome:</span>
          <input class="form-control" type="text" name="no_responsavel" id="no_responsavel" maxlength="100" value="{{$responsavel->no_responsavel}}" required>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">E-mail</span>
          <input class="form-control" type="text" name="no_email" id="no_email" maxlength="30"
          value="{{$responsavel->no_email}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">Tel. Fixo:</span>
          <input class="form-control" type="text" name="nu_telefone" id="nu_telefone" maxlength="15"
          value="{{$responsavel->nu_telefone}}" required>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="input-group">
          <span class="input-group-addon">Tel. Celular:</span>
          <input class="form-control" type="text" name="nu_celular" id="nu_celular" maxlength="15"
          value="{{$responsavel->nu_celular}}">
        </div>
      </div>
    </div>
    <label for="status">Status:</label>
    <label class="radio-inline"><input type="radio" name="status" id="status" value="1"
    @if($responsavel->status == 1)
    checked
    @endif
    > Ativo</label>
    <label class="radio-inline"> <input type="radio" name="status" id="status" value="0"
    @if($responsavel->status == 0)
    checked
    @endif
    > Inativo</label>
    <div class="form-group">
      <label for="ds_observacao">Observações:</label>
      <textarea class="form-control" id="ds_observacao" name="ds_observacao" rows="5">{{$responsavel->ds_observacao}}</textarea>
    </div>
    <div class="text-right">
      <a href="javascript:history.back()" class="btn btn-warning btn-sm">Cancelar</a>
      <button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Alterar</button>
    </div>
  </form>

</div>
<!-- fim container -->
@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}}></script>
<script type="text/javascript">
  $(document).ready(function($){
    $('#nu_telefone').mask('(00) 0000-0000');
    $('#nu_celular').mask('(00) 00000-0000');
  });
</script>
