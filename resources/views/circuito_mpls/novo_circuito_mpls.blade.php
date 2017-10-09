@extends('menu')
@section('title', 'Novo Circuito MPLS')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body"><h4>Novo Circuito MPLS</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<div class="row">
		<form id="form_circuito_mpls" method="post" action="">
			@include('circuito_mpls.form')
			<div class="text-right">
				<a href="javascript:history.back();" class="btn btn-warning btn-sm">Cancelar</a>
				<button type="input" class="btn btn-success btn-sm" id="btn_salvar">Salvar</button>
			</div>			
		</form>
	</div>
	<!-- fim formulario -->
</div>
@endsection
