@extends('menu')
@section('title', 'Nova Movimentação')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body"><h4>Nova Movimentação</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<form id="mov_circuito" method="post" action={{route('movimentacao_circ.inserir')}}>
		@include('mov_circuito.form')
		<div class="text-right">
			<a href="javascript:history.back();" class="btn btn-warning btn-sm">Cancelar</a>
			<button type="submit" id="btn_salvar" class="btn btn-success btn-sm">Salvar</button>
		</div>
	</form>
	
</div>
@endsection