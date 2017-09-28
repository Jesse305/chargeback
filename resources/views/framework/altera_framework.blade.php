@extends('menu')
@section('title', 'Alterar Framework')

@section('content')

<div class="container">
  <div class="row">
    <div class="panel panel-default">
			<div class="panel-heading"><h4>Alterar Framework</h4></div>
		</div>
  </div>
  <!-- fim painel -->

  <div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
      <form class="form_framework" action={{route('framework.atualizar', $framework->id)}} method="post">
        {{csrf_field()}}
        <input type="hidden" name="_update" value="update">
        <div class="input-group">
          <span class="input-group-addon">Nome:</span>
          <input class="form-control" type="text" name="no_framework" id="no_framework" required maxlength="200"
          placeholder="nome do framework" value="{{$framework->no_framework}}">
        </div>
        <div class="text-right" style="margin-top: 10px;">
          <a href="javascript:history.back();" class="btn btn-warning btn-sm" >Cancelar</a>
          <button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Alterar</button>
        </div>
      </form>
    </div>
  </div>
  <!-- fim do form -->
</div>
<!-- fim container -->

@endsection
