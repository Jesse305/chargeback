@extends('menu')
@section('title', 'Novo Servidor VM')
@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body"><h4>Cadastrar Servidor VM</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- alertas -->
	@if(session('retorno'))
	<div class="row">
		<div class="alert alert-{{session('retorno')['tipo']}} alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <li>{{session('retorno')['msg']}}</li>
		</div>
	</div>
	@endif
	<!-- fim alertas -->

	<!-- alertas validação -->
	@if ($errors->any())
    <div class="alert alert-danger alert-dismissable">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	<!-- fim alertas validação -->
	
	<!-- formulário -->
	<div class="row">
		<form id="form_novo" method="POST" action={{route('servidor_vm.inserir')}}>
			{{csrf_field()}}
			@include('serv_vm.form_serv_vm')

			<div class="text-right">
				<a href="javascript:history.back();" class="btn btn-warning btn-sm">Cancelar</a>
				<button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Salvar</button>
			</div>
		</form>
	</div>
	<!-- fim formulario -->
</div>
@endsection