@extends('menu')
@section('title', 'Servidores VM')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Servidores VM</h4></div>
			<div class="panel-body">
				<div class="text-right">
					<a href="#" class="btn btn-success btn-sm">Novo Servidor VM</a>
				</div>
			</div>
		</div>		
	</div>
	<!-- fim panel -->

	<!-- tabela -->
	<div class="row">
		<table class="table table-striped table-bordered table-hover" style="font-size: 12px;">
			<thead>
				<tr>
					<td>Nome:</td>
					<td>End. IP:</td>
					<td>DNS:</td>
					<td>Status:</td>
					<td align="center" width="100">Ações</td>
				</tr>
			</thead>
			<tbody>
				@foreach($servs_vm as $svm)
				<tr>
					<td>{{$svm->no_servidor}}</td>
					<td>{{$svm->ip_endereco}}</td>
					<td>{{$svm->no_dns}}</td>
					<td>
						@if($svm->status == '1')
						Ativo
						@else
						Inativo
						@endif
					</td>
					<td align="center">Ações</td>
				</tr>
				@endforeach				
			</tbody>
			<tfoot>
				<tr>
					<td>Nome:</td>
					<td>End. IP:</td>
					<td>DNS:</td>
					<td>Status:</td>
					<td align="center">Ações</td>
				</tr>				
			</tfoot>			
		</table>
	</div>
	<!-- fim tabela -->
</div>
@endsection