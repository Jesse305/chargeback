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
		@if($sistema->unidade)
		<tr>
			<td><b>Unidade:</b></td>
			<td>{{$sistema->unidade->no_unidade}}</td>
		</tr>
		@else
		<tr>
			<td><b>Unidade:</b></td>
			<td><i>Nenhuma unidade vinculada.</i></td>
		</tr>
		@endif
	</table>

	<!-- fim solicitante -->

	<h5><b>Responsável:</b></h5>
	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
		@if($sistema->responsavel)
		<tr>
			<td><b>Nome:</b> {{$sistema->responsavel->no_responsavel}} </td>
			<td><b>email:</b> {{$sistema->responsavel->no_email}} </td>
		</tr>
		<tr>
			<td><b>Telefone:</b> {{$sistema->responsavel->nu_telefone}} </td>
			<td><b>Celular:</b> {{$sistema->responsavel->nu_celular}} </td>
		</tr>
		@else
		<tr>
			<td colspan="2"><i>Nenhum responsável vinculado</i></td>
		</tr>
		@endif
	</table>
	<!-- fim resposaveis -->

	<h5><b>Banco(s) de Dados</b></h5>

	@foreach($sistema->bancos as $banco)

		<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
			<tr>
				<td colspan="2"><b>Schema:</b>  {{$banco->schema_banco}} </td>
				<td><b>IP:</b>  {{$banco->ip_banco}} </td>
			</tr>
			<tr>
				<td><b>Ambiente:</b>  {{$banco->ambiente_banco}} </td>
				<td><b>Tecnologia:</b>  {{$banco->tecnologia_banco}} </td>
				<td class="col-xs-2"><b>Detalhes:</b>
					<div class="pull-right">
						<a href={{route('banco.detalhar', $banco->id_banco)}} class="btn btn-info btn-sm" title="visualizar detalhes">
							<i class="glyphicon glyphicon-eye-open"></i>
						</a>
					</div>
				</td>
			</tr>
		</table>

	@endforeach

	<!-- fim banco de dados -->

	<h5><b>Ambientes</b></h5>
	<table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
		<tr>
			<td><b>Link:</b> <a href="{{$sistema->ambiente->link_prod}}">{{$sistema->ambiente->link_prod}}</a></td>
			<td class="col-xs-2"><b>Detalhes:</b>
				<div class="pull-right">
					<a href={{route('ambiente.detalhar', $sistema->ambiente->id)}} class="btn btn-info btn-sm" title="visualizar detalhes">
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
			@foreach($sistema->desenvolvedores as $d)
			<tr>
				<td>{{$d->no_dev}} </td>
				<td>{{$d->ip_dev}} </td>
			</tr>
			@endforeach
		</tbody>

	</table>
	<!-- fim desenvolvedores -->

	<h5><b>Frameworks</b></h5>
	@if(count($sistema->frameworks) < 1)
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
				@foreach($sistema->frameworks as $f)
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