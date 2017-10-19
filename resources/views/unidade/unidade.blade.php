@extends('menu')
@section('title', 'Unidade')

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Detalhes da Unidadade</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- tabela -->
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td><b>Orgão:</b></td>
					<td> {{$unidade->orgao->no_sigla}} - {{$unidade->orgao->no_orgao}}</td>
				</tr>
				<tr>
					<td class="col-xs-2"><b>Sigla:</b> {{$unidade->no_sigla}}</td>
					<td class="col-xs-10"><b>Unidade:</b> {{$unidade->no_unidade}}</td>
				</tr>
				<tr>
					<td><b>Endereço:</b></td>
					<td>{{$unidade->no_endereco}}</td>
				</tr>
				<tr>
					<td><b>CEP:</b> {{$unidade->nu_cep}} </td>
					<td><b>Cidade:</b> {{$cidade->no_cidade}}</td>
				</tr>
				<tr>
					<td><b>Status:</b>
						@if($unidade->status == 1)
						Ativo
						@else
						Inativo
						@endif
					</td>
					<td>
						<b>Data Cadastro:</b>
						@if($unidade->dt_cadastro)
						{{$unidade->dt_cadastro}}
						@else
						Informação indisponível.
						@endif
						&nbsp;
						<b>Data Atualização:</b>
						@if($unidade->dt_atualizacao)
						{{$unidade->dt_atualizacao}}
						@else
						Informação indisponível.
						@endif

					</td>
				</tr>
			</table>
			<div class="text-right">
				<a href="javascript:history.back()" class="btn btn-success btn-sm">
					<i class="glyphicon glyphicon-arrow-left"></i>
				</a>
			</div>
		</div>
	</div>
	<!-- fim tabela -->
</div>
<!-- fim container -->

@endsection