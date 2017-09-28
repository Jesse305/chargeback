@extends('menu')
@section('title', 'Altera Órgão')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Altera Órgão</h4></div>
	</div>
	<!-- fim painel -->

	<!-- form -->
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			@foreach($orgao as $org)
			<form id="form_orgao" method="POST" action={{route('orgao.atualizar', $org->id)}}>
				{{csrf_field()}}		
				  <div class="input-group">
				    <span class="input-group-addon">Nome:</span>
				    <input id="no_orgao" type="text" class="form-control" name="no_orgao" placeholder="Nome do Orgão"
				    required maxlength="100" value="{{$org->no_orgao}}" >
				  </div>

				  <div class="input-group">	
			    	<span class="input-group-addon">Sigla:</span>
			    	<input id="no_sigla" type="text" class="form-control" name="no_sigla" placeholder="Sigla do Orgão"
			    	required maxlength="15" onkeyup="maiuscula(this);" value="{{$org->no_sigla}}">			    
				  </div>

				  <div class="input-group">
				  	<span class="input-group-addon">Tipo:</span>
				  	<select class="form-control" name="tp_orgao" id="tp_orgao">
				  		<option value="0"
				  		@if($org->tp_orgao == 0)
				  		selected
				  		@endif
				  		>Administração Direta</option>
				  		<option value="1"
				  		@if($org->tp_orgao == 1)
				  		selected
				  		@endif
				  		>Administração Indireta</option>
				  	</select>
				  </div>

				  <div class="input-group">
				  	<span class="input-group-addon">Status:</span>
				  	<select class="form-control" name="status" id="status">
				  		<option value="1"
				  		@if($org->status == 1)
				  		selected
				  		@endif
				  		>Ativo</option>
				  		<option value="0"
				  		@if($org->status ==0)
				  		selected
				  		@endif
				  		>Inativo</option>
				  	</select>
				  </div>

				  <div class="text-right" style="margin-top: 10px;">
				  	<a href="javascript:history.back()" class="btn btn-warning btn-sm">Cancelar</a>
				  	<button type="submit" id="btn_alterar" class="btn btn-success btn-sm">Alterar</button>
				  </div>

			</form>
			@endforeach			
		</div>
	</div>
	<!-- fim form -->
	
</div>
<!-- fim container -->

@endsection