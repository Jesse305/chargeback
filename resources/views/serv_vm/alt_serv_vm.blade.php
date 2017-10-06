@extends('menu')
@section('title', 'Alterar Servidor VM')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body"><h4>Alterar Servidor VM</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- form -->
	<form id="form_alterar" method="post" action="">
		{{csrf_field()}}
		@include('serv_vm.form_serv_vm')
		<div class="text-right">
			<a href="javascript:history.back()" class="btn btn-warning btn-sm">Cancelar</a>
			<button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Alterar</button>
		</div>		
	</form>
	<!-- fim form -->
</div>
@endsection