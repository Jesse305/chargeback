@extends('menu')
@section('title', 'Detalhes Servidor VM')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body"> <h4>Detalhes Servidor VM</h4> </div>
		</div>
	</div>
	<!-- fim painel -->
	<div class="row">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<td colspan="3"><h4><font color="#000080">Responsável</font></h4></td>
			</tr>
			<tr>
				<td colspan="2"><b>Órgão:</b> {{$serv_vm->orgao->no_orgao}}</td>
				<td><b>Sigla:</b> {{$serv_vm->orgao->no_sigla}}</td>
			</tr>
			@if(count($serv_vm->unidade) > 0)
			<tr>
				<td colspan="2"><b>Unidade:</b> {{$serv_vm->unidade->no_unidade}}</td>
				<td colspan="2"><b>Sigla:</b> {{$serv_vm->unidade->no_sigla}}</td>
			</tr>
			@else
			<tr>
				<td colspan="3"> <b>Unidade:</b> <font color="red"> Nenhuma unidade encontrada.</font></td>
			</tr>
			@endif

			@if(count($serv_vm->resp) > 0)
			<tr>
				<td><b>Nome Responsável: </b>{{$serv_vm->resp->no_responsavel}}</td>
				<td><b>Telefone: </b>{{$serv_vm->resp->nu_telefone}}</td>
				<td><b>Detalhes do Responsável:</b>
					<div class="pull-right">
						<a href={{route('responsavel.detalha', $serv_vm->resp->id)}} class="btn btn-info btn-sm" title="visualizar">
							<i class="glyphicon glyphicon-eye-open"></i>
						</a>
					</div>
				</td>
			</tr>
			@else
			<tr>
				<td colspan="3"> <b>Responsável:</b> <font color="red"> Nenhum responsavel encontrado.</font></td>
			</tr>
			@endif
			<tr>
				<td colspan="3"><h4><font color="#000080">Servidor VM</font></h4></td>
			</tr>
			<tr>
				<td colspan="2"><b>Nome:</b> {{$serv_vm->no_servidor}}</td>
				<td><b>Status:</b> {{$serv_vm->printStatus($serv_vm->status)}}</td>
			</tr>
			<tr>
				<td colspan="2"><b>Sistema Operacional:</b> {{$serv_vm->existe($serv_vm->sis_operacional)}}</td>
				<td><b>Cloud Server:</b> {{$serv_vm->existe($serv_vm->cloud_server)}}</td>
			</tr>
			<tr>
				<td colspan="2"><b>DNS:</b> {{$serv_vm->no_dns}}</td>
				<td><b>IP:</b> {{$serv_vm->ip_endereco}}</td>
			</tr>
			<tr>
				<td><b>CPU Count:</b> {{$serv_vm->existe($serv_vm->nu_cpu)}}</td>
				<td><b>Espaço SAS:</b> {{$serv_vm->existe($serv_vm->nu_espaco_sas)}}</td>
				<td><b>Espaço SATA:</b> {{$serv_vm->existe($serv_vm->nu_espaco_sata)}}</td>
			</tr>
			<tr>
				<td colspan="2"><b>Data Cadastro:</b> {{$serv_vm->dt_cadastro}}</td>
				<td><b>Data Atualização:</b> {{$serv_vm->existe($serv_vm->dt_atualizacao)}} </td>
			</tr>
			<tr>
				<td colspan="3"><b>Observações:</b> {{$serv_vm->existe($serv_vm->ds_observacao)}}</td>
			</tr>
		</table>
	</div>
	<div class="row">
		<div class="text-right">
			<a href="javascript:history.back();" class="btn btn-success btn-sm" title="voltar">
				<i class="glyphicon glyphicon-arrow-left"></i>
			</a>
		</div>
	</div>
</div>
@endsection