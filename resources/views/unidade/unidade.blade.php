@extends('menu')
@section('title', 'Unidade')

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
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
					<td> {{$orgao[0]->no_sigla}} - {{$orgao[0]->no_orgao}}</td>
				</tr>
				<tr>
					<td class="col-xs-2"><b>Sigla:</b> {{$unidade[0]->no_sigla}}</td>
					<td class="col-xs-10"><b>Unidade:</b> {{$unidade[0]->no_unidade}}</td>
				</tr>
				<tr>
					<td><b>Endereço:</b></td>
					<td>{{$unidade[0]->no_endereco}}</td>
				</tr>
				<tr>
					<td><b>CEP:</b> {{$unidade[0]->nu_cep}} </td>
					<td><b>Cidade:</b> {{$cidade[0]->no_cidade}}</td>
				</tr>
				<tr>
					<td><b>Status:</b>
						@if($unidade[0]->status == 1)
						Ativo
						@else
						Inativo
						@endif
					</td>
					<td>
						<b>Data Cadastro:</b>
						@if($unidade[0]->dt_cadastro)
						{{$unidade[0]->dt_cadastro}}
						@else
						Informação indisponível.
						@endif
						&nbsp;
						<b>Data Atualização:</b>
						@if($unidade[0]->dt_atualizacao)
						{{$unidade[0]->dt_atualizacao}}
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