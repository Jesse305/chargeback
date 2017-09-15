@extends('menu')
@section('title', 'Banco')

@section('content')

<div class="container" style="margin-top: 60px;">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Banco de Dados</h4></div>
		</div>
		<!-- fim painel -->
	</div>
	<!-- fim da primeira row -->

	<!-- segunda row -->

	<table class="table table-striped table-bordered table-hover" id="tab_detalhes">
		@foreach($banco as $b)
		<tr>
			<td class="col-xs-4"><b>Abiente:</b></td>
			<td class="col-xs-8">{{ $b->ambiente_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Tecnologia:</b></td>
			<td class="col-xs-8">{{ $b->tecnologia_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>IP:</b></td>
			<td class="col-xs-8">{{ $b->ip_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Schema:</b></td>
			<td class="col-xs-8">{{ $b->schema_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Usuário:</b></td>
			<td class="col-xs-8">{{ $b->usuario_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Senha:</b></td>
			<td class="col-xs-8">
				<div class="input-group">
					<input class="form-control" id="senha" type="password" name="senha" value="{{ $b->senha_banco}}" readonly />
					<span class="input-group-addon">
						<button class="btn btn-xs" id="revela_senha" title="mostrar senha"><i class="glyphicon glyphicon-eye-open"></i></button>
					</span>
				</div>
			</td>
		</tr>
		@endforeach
	</table>

	<div class="pull-right">
		<button class="btn btn-success btn-sm" title="voltar" id="btn_voltar"><span class="glyphicon glyphicon-arrow-left"></span> voltar</button>
	</div>

	<!-- fim segunda row -->
</div>
<!-- fim primeiro container -->
<script type="text/javascript" src={{ asset('js/jquery.js') }}></script>
<script type="text/javascript" src={{ asset('js/banco.js') }}></script>
@endsection