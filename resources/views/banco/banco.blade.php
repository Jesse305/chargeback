@extends('menu')
@section('title', 'Banco')

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Banco de Dados</h4></div>
		</div>
		<!-- fim painel -->
	</div>
	<!-- fim da primeira row -->

	<!-- segunda row -->

	<table class="table table-striped table-bordered table-hover" id="tab_detalhes">
		<tr>
			<td class="col-xs-4"><b>Ambiente:</b></td>
			<td class="col-xs-8">{{ $banco->ambiente_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Tecnologia:</b></td>
			<td class="col-xs-8">{{ $banco->tecnologia_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>IP:</b></td>
			<td class="col-xs-8">{{ $banco->ip_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Schema:</b></td>
			<td class="col-xs-8">{{ $banco->schema_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Usuário:</b></td>
			<td class="col-xs-8">{{ $banco->usuario_banco }}</td>
		</tr>
		<tr>
			<td class="col-xs-4"><b>Senha:</b></td>
			<td class="col-xs-8">
				<div class="input-group">
					<input class="form-control" id="senha" type="password" name="senha" value="{{ $banco->senha_banco}}" readonly />
					<span class="input-group-addon">
						<button class="btn btn-xs" id="revela_senha" title="mostrar senha"><i class="glyphicon glyphicon-eye-open"></i></button>
					</span>
				</div>
			</td>
		</tr>
	</table>

	<div class="pull-right">
		<a href="javascript:history.back()" class="btn btn-success" title="voltar"><span class="glyphicon glyphicon-arrow-left"></span></a>
	</div>

	<!-- fim segunda row -->
</div>
<!-- fim primeiro container -->
<script type="text/javascript" src={{ asset('js/jquery.js') }}></script>
<script type="text/javascript" src={{ asset('js/banco.js') }}></script>
@endsection