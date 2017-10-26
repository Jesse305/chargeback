@extends('menu')
@section('title', 'Altera Sistema')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Alterar Sistema</h4></div>
		</div>
	</div>
	<!-- fim painel -->
	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<!-- alerts -->
		    @if(Session::has('retorno'))
		    <div class="alert alert-{{Session::get('retorno')['tipo']}} alert-dismissable">
		      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		      <li>{{Session::get('retorno')['msg']}}</li>
		    </div>
		    @endif
		    <!-- fim alerts -->
			<div class="alerta" id="alerta"></div>			
			<form id="form_sis" method="POST" action={{route('sistema.atualizar', $sistema->id)}}>
				
					@include('sistema.form')

				<div class="text-right" style="margin-top: 20px;">
					<a href="javascript: history.back();" class="btn btn-warning btn-sm">Cancelar</a>
					<button class="btn btn-success btn-sm" type="input" id="btn_alterar">Alterar</button>
				</div>
				
			</form>
			
		</div>	
	</div>

</div>
<!-- fim container -->
@endsection
<script type="text/javascript" src={{ asset('js/jquery.js') }}></script>
<script type="text/javascript" src={{ asset('js/alt_sistema.js') }}></script>