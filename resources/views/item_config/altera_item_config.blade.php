@extends('menu')
@section('title', 'Altera Item Configuração')

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
				<div class="panel-heading"><h4>Altera Item de Configuração</h4></div>
			</div>
		</div>
	</div>
	<!-- fim painel -->
	<!-- alertas -->
	<div id="alerta"></div>
	<!-- fim alertas -->
	<!-- formulario alterar -->
	<div class="row">
		<div class="col-xs-12">
			<form id="form_altera" method="post" action="">
				{{csrf_field()}}
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
			      			<span class="input-group-addon">Nome:</span>
			      			<input class="form-control" type="text" name="no_item" id="no_item" maxlength="150" required
			      			value="{{$item->no_item}}">
			      		</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
							<span class="input-group-addon">Categoria:</span>
							<select class="form-control" id="categoriaitem_id" name="categoriaitem_id">
			      				<option value="">--Selecione--</option>
			      				@foreach($categoriasItens as $catItens)
			      				<option value="{{$catItens->id}}"
			      				@if($item->categoriaitem_id == $catItens->id) selected @endif
			      				>{{$catItens->no_categoriaitem}}</option>
			      				@endforeach
			      			</select>
						</div>
					</div>
				</div>
				<!-- fim da row 1 -->
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
			      			<span class="input-group-addon">Configuração:</span>
			      			<input class="form-control" type="text" name="ds_configuracao" id="ds_configuracao" maxlength="100" required value="{{$item->ds_configuracao}}">
			      		</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
			      			<span class="input-group-addon">Custo Mensal:</span>
			      			<input class="form-control" type="text" name="nu_custo_mensal" id="nu_custo_mensal" maxlength="13" required value="{{$item->nu_custo_mensal}}">
			      		</div>
					</div>
				</div>
				<div class="text-right">
					<a href="javascript:history.back();" class="btn btn-warning btn-sm">Cancelar</a>
					<button type="submit" class="btn btn-success btn-sm" id="btn_alterar">Alterar</button>
				</div>
			</form>
		</div>
	</div>
	<!-- fim do formulario alterar -->
</div>
@endsection