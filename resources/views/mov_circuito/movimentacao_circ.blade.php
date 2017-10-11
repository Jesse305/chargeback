@extends('menu')
@section('title', 'Detalhes Movimentação')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Detalhes Movimentação</h4>
			</div>
		</div>
	</div>
	<!-- fim painel -->
	<div class="row">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<td class="col-xs-12 col-md-6"><b>Unidade Anterior:</b> {{$mc->getUnidade($mc->unidade_id)->no_unidade}}</td>
				<td class="col-xs-12 col-md-6"><b>Circuito Anterior:</b> {{$mc->getItemConfig($mc->itemdeconfiguracao_id)->no_item}}</td>
			</tr>
			<tr>
				<td class="col-xs-12 col-md-6"><b>Designação Anterior:</b> {{$mc->no_designacao}}</td>
				<td class="col-xs-12 col-md-6"><b>IP Anterior:</b> {{$mc->ip_lan}}</td>
			</tr>
			<tr>
				<td class="col-xs-12 col-md-6"><b>Máscara Anterior:</b> {{$mc->ip_mascara}}</td>
				<td class="col-xs-12 col-md-6"><b>WAN Cliente Anterior:</b> {{$mc->wan_cliente}}</td>
			</tr>
			<tr>
				<td colspan="2" class="col-xs-12 col-md-6"><b>WAN Operadora Anterior:</b> {{$mc->wan_operadora}}</td>
			</tr>
			<tr>
				<td class="col-xs-12 col-md-6"><b>Instalação:</b> {{$mc->dt_instalacao}}</td>
				<td class="col-xs-12 col-md-6"><b>Homologação:</b> {{$mc->dt_homologacao}}</td>
			</tr>
			<tr>
				<td class="col-xs-12 col-md-6"><b>Cadastro:</b> {{$mc->dt_cadastro}}</td>
				<td class="col-xs-12 col-md-6"><b>Atualização:</b> {{$mc->nulo($mc->dt_atualizacao)}}</td>
			</tr>
			<tr>
				<td colspan="2" class="col-xs-12">
					<b>Observações:</b>{{$mc->nulo($mc->ds_observacao)}}
				</td>
			</tr>
		</table>		
	</div>
	<!-- fim tabela -->
	<div class="text-right">
		<a href="javascript:history.back();" class="btn btn-success btn-sm" title="voltar">
			<i class="glyphicon glyphicon-arrow-left"></i>
		</a>
	</div>
</div>
@endsection