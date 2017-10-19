@extends('menu')
@section('title', 'Detalhes Sistema')

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Detalhes Sistema</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- tabela -->

	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">

		<h5><b>Sistema</b></h5>
		<tr>
			<td colspan="2"><b>Nome:</b>  {{$sistema->no_sistema}}</td>
			<td><b>Sigla:</b>  {{$sistema->no_sigla}}</td>
		</tr>
		<tr>
			<td><b>Linguagem:</b>  {{$sistema->desenvolvimento}}</td>
			<td><b>Acesso:</b>  {{$sistema->tp_acesso}}</td>
			<td><b>Status:</b>  {{$sistema->status}}</td>
		</tr>
		<tr>
			<td><b>Data Cadastro: </b> {{$sistema->dt_cadastro}}</td>
			<td><b>Data Atualização: </b> {{$sistema->dt_atualizacao}}</td>
		</tr>

	</table>
	<!-- fim sistema -->

	<h5><b>Solicitante</b></h5>
	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">

		<tr>
			<td><b>Orgão:</b></td>
			<td>{{$sistema->orgao->no_orgao}}</td>
		</tr>
		<tr>
			<td><b>Unidade:</b></td>
			<td>{{$sistema->unidade->no_unidade}}</td>
		</tr>
	</table>

	<!-- fim solicitante -->

	<h5><b>Responsável(eis):</b></h5>
	@if(count($responsaveis) < 1)
	<h5><font color="red">Não há responsável vinculdado.</font></h5>
	@else
		<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
		@foreach($responsaveis as $resps)
		<tr>
			<td><b>Nome:</b> {{$resps->no_responsavel}} </td>
			<td><b>email:</b> {{$resps->no_email}} </td>
		</tr>
		<tr>
			<td><b>Telefone:</b> {{$resps->nu_telefone}} </td>
			<td><b>Celular:</b> {{$resps->nu_celular}} </td>
		</tr>
		@endforeach
		</table>
	@endif
	<!-- fim resposaveis -->

	<h5><b>Banco de Dados</b></h5>
	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
		<tr>
			<td colspan="2"><b>Schema:</b>  {{$sistema->banco->chema_banco}} </td>
			<td><b>IP:</b>  {{$sistema->banco->ip_banco}} </td>
		</tr>
		<tr>
			<td><b>Ambiente:</b>  {{$sistema->banco->ambiente_banco}} </td>
			<td><b>Tecnologia:</b>  {{$sistema->banco->tecnologia_banco}} </td>
			<td class="col-xs-2"><b>Detalhes:</b>
				<div class="pull-right">
					<a href={{route('banco.detalhar', $sistema->banco->id_banco)}} class="btn btn-info btn-sm" title="visualizar detalhes">
						<i class="glyphicon glyphicon-eye-open"></i>
					</a>
				</div>
			</td>
		</tr>
	</table>
	<!-- fim banco de dados -->

	<h5><b>Ambientes</b></h5>
	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
		<tr>
			<td><b>Link:</b> <a href="{{$sistemas->ambientes->link_prod}}">{{$sistemas->ambientes->link_prod}}</a></td>
			<td class="col-xs-2"><b>Detalhes:</b>
				<div class="pull-right">
					<a href={{route('ambiente.detalhar', $sistemas->ambientes->id)}} class="btn btn-info btn-sm" title="visualizar detalhes">
						<i class="glyphicon glyphicon-eye-open"></i>
					</a>
				</div>
			</td>
		</tr>
	</table>
	<!-- fim ambiente -->

	<h5><b>Desenvolvedores</b></h5>
	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
		<thead>
			<tr>
				<td>Nome:</td>
				<td>IP:</td>
			</tr>
		</thead>
		<tbody>
			@foreach($devs as $d)
			<tr>
				<td>{{$d->no_dev}} </td>
				<td>{{$d->ip_dev}} </td>
			</tr>
			@endforeach
		</tbody>

	</table>
	<!-- fim desenvolvedores -->

	<h5><b>Frameworks</b></h5>
	@if(count($frames) < 1)
	<h5><font color="red">Sistema não faz uso de framework.</font></h5>
	@else
	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">

		<tr>
			<thead>
				<tr>
					<td><center><b>Nome(s):</b></center></td>
				</tr>
			</thead>
			<tbody>
				@foreach($frames as $f)
				<tr>
					<td>{{$f->no_framework}}</td>
				</tr>
				@endforeach
			</tbody>
		</tr>

	</table>
	@endif
	<!-- fim frameworks -->

	<div class="text-right">
		<button class="btn btn-success btn-sm" onclick="javascript: history.back();">
			<span class="glyphicon glyphicon-arrow-left"></span>
		</button>
	</div>

</div>
<!-- fim container -->

@endsection
