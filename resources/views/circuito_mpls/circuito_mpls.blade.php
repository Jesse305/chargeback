@extends('menu')
@section('title', 'Detalhes Circuito MPLS')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body"><h4>Detlalhes Circuito MPLS</h4></div>
		</div>
	</div>
	<!-- fim painel -->
	<div class="row">
		<h4><font color="#000080">Responsável</font></h4>
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<td><b>Órgão: </b>{{$circuito->getOrgao($circuito->orgao_id)->no_sigla}} - {{$circuito->getOrgao($circuito->orgao_id)->no_orgao}}</td>
				<td><b>Unidade: </b>{{$circuito->getUnidade($circuito->unidade_id)->no_sigla}} - {{$circuito->getUnidade($circuito->unidade_id)->no_unidade}}
					<div class="pull-right">
						<a href={{route('unidade.detalhar', $circuito->getUnidade($circuito->unidade_id)->id)}} class="btn btn-info btn-sm" title="mais detalhes da unidade">
							<i class="glyphicon glyphicon-eye-open"></i>
						</a>
					</div>
				</td>
			</tr>
			<tr>
				<td><b>Nome:</b> {{$circuito->getResponsavel($circuito->responsavel_id)->no_responsavel}}</td>
				<td><b>E-mail:</b> {{$circuito->existe($circuito->getResponsavel($circuito->responsavel_id)->no_email)}}</td>
			</tr>
			<tr>
				<td><b>Tel. Fixo:</b> {{$circuito->getResponsavel($circuito->responsavel_id)->nu_telefone}}</td>
				<td><b>Tel. Celular:</b> {{$circuito->existe($circuito->getResponsavel($circuito->responsavel_id)->nu_celular)}}</td>
			</tr>
		</table>
	</div>
	<!-- fim tabela responsável -->
	<div class="row">
		<table class="table table-bordered table-striped table-hover">
			<h4><font color="#000080">Circuito MPLS</font></h4>
			<tr>
				<td><b>Circuito:</b> {{$circuito->getItemConfig($circuito->itemdeconfiguracao_id)->no_item}}</td>
				<td><b>Designação:</b> {{$circuito->no_designacao}}</td>
				<td><b>Status:</b> {{$circuito->printStatus($circuito->status)}}</td>
			</tr>
			<tr>
				<td><b>Lote:</b> {{$circuito->nu_lote}}</td>
				<td><b>Qtd. Usuários:</b> {{$circuito->nu_usuarios}}</td>
				<td><b>IP LAN:</b> {{$circuito->ip_lan}}</td>
			</tr>
			<tr>
				<td><b>Máscara:</b> {{$circuito->ip_mascara}}</td>
				<td><b>WAM Cliente:</b> {{$circuito->wan_cliente}}</td>
				<td><b>WAM Operadora:</b> {{$circuito->wan_operadora}}</td>
			</tr>
			<tr>
				<td colspan="3"><b>Faixa DHCP:</b> {{$circuito->nu_dhcp}}</td>
			</tr>
			<tr>
				<td><b>Data Instalação:</b> {{$circuito->dt_instalacao}}</td>
				<td><b>Data Homologação:</b> {{$circuito->dt_homologacao}}</td>
				<td><b>Data Cadastro:</b> {{$circuito->dt_cadastro}}</td>
			</tr>
			<tr>
				<td><b>Data Atualização:</b> {{$circuito->existe($circuito->dt_atualizacao)}}</td>
				<td colspan="2"><b>Observações:</b>{{$circuito->existe($circuito->ds_observacao)}}</td>
			</tr>
		</table>
	</div>
	<div class="text-right">
		<a href="javascript:history.back();" class="btn btn-success btn-sm" title="voltar">
			<i class="glyphicon glyphicon-arrow-left"></i>
		</a>
	</div>
</div>
@endsection