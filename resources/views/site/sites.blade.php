@extends('menu')
@section('title', 'Sites')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
	<div class="row">
		<div class="col-xs-12">
    		<div class="panel panel-default">
			  <div class="panel-heading"><h4>Sites</h4></div>
			  <div class="panel-body text-right">
			  	<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="Cadastrar novo sistema"
			  	data-toggle="modal" data-target="#modal_cad">Novo Site</button>
			  </div>
			</div>
		</div>
	</div>
	<!-- fim painel -->

<!-- modal -->

<div id="modal_cad" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cadastro de Site</h4>
      </div>
      <div class="modal-body">

      	<form id="form_cad" method="POST" action="">
      		{{csrf_field()}}
      		<div class="input-group">
      			<span class="input-group-addon">Orgão:</span>
      			<select class="form-control" name="no_site">
      				<option value="">--Selecione--</option>
      				@foreach($listaOrgaos as $orgaos)
      				<option value="{{$orgaos->id}}">{{$orgaos->no_sigla}} - {{$orgaos->no_orgao}}</option>
      				@endforeach
      			</select>
      		</div>
      	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="form_cad" class="btn btn-success btn-sm" id="btn_salvar">Salvar</button>
      </div>
    </div>

  </div>
</div>

<!-- fim modal -->

</div>
<!-- fim container -->

@endsection