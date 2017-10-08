@extends('menu')
@section('title', 'Servidores VM')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Servidores VM</h4></div>
			<div class="panel-body">
				<div class="text-right">
					<a href={{route('servidor_vm.form.insere')}} class="btn btn-success btn-sm">Novo Servidor VM</a>
				</div>
			</div>
		</div>		
	</div>
	<!-- fim panel -->

	<!-- alertas -->
	@if(session('retorno'))
	<div class="row">
		<div class="alert alert-{{session('retorno')['tipo']}} alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <li>{{session('retorno')['msg']}}</li>
		</div>
	</div>
	@endif
	<!-- fim aletas -->

	<!-- tabela -->
	<div class="row">
		<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">
			<thead>
				<tr>
					<td>Nome:</td>
					<td>End. IP:</td>
					<td>DNS:</td>
					<td>Status:</td>
					<td align="center" width="150">Ações</td>
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
					<td align="center">
						<a href={{route('servidor_vm.detalhar', $svm->id)}} class="btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open" title="visualizar"></i></a>&nbsp;
						<a href={{route('servidor_vm.altera', $svm->id)}} class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit" title="editar"></i></a>&nbsp;
						<button class="btn btn-danger btn-sm" onclick="confirmaDeleta('{{route('servidor_vm.apagar', $svm->id)}}');" title="cuidado! apaga o registro definitivamente." disabled><i class="glyphicon glyphicon-remove"></i></button>
					</td>
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

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/serv_vm.js')}}></script>