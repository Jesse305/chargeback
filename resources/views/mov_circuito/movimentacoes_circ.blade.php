@extends('menu')
@section('title', 'Movimentações de Circuito')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Movimentações de Circuito</h4>
			</div>
			<div class="panel-body text-right">
				<a href={{route('movimentacao_circ.novo', $id)}} class="btn btn-success btn-sm" title="cadastrar movimentação">Nova Movimentação</a>
			</div>
		</div>
	</div>
	<!-- fim painel -->

	@if(session('retorno'))
	<div class="row">
		<div class="alert alert-{{session('retorno')['tipo']}} alert-dismissable">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<ul>
				<li>{{session('retorno')['msg']}}</li>
			</ul>
		</div>
	</div>
	@endif

	<!-- tabela -->
	<div class="row">
			<table class="table table-bordered table-striped table-hover" id="tab_resumo" style="font-size: 12px;">
				<thead>
					<tr>
						<td>Data Cadastro:</td>
						<td>Unidade Anterior:</td>
						<td>Circuito Anterior:</td>
						<td>Designação:</td>
						<td align="center">Visualizar</td>
					</tr>
				</thead>
				<tbody>
					@foreach($movs_circuito as $mc)
					<tr>
						<td>{{$mc->dt_cadastro}}</td>			
						<td>{{$mc->getUnidade($mc->unidade_id)->no_unidade}}</td>			
						<td>{{$mc->getItemConfig($mc->itemdeconfiguracao_id)->no_item}}</td>			
						<td>{{$mc->no_designacao}}</td>			
						<td align="center">
							<a href={{route('movimentacao_circ.detalhar', $mc->id)}} class="btn btn-info btn-sm" title="visualizar">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
						</td>
					</tr>
					@endforeach			
				</tbody>			
				<tfoot>
					<tr>
						<td>Data Cadastro:</td>
						<td>Unidade Anterior:</td>
						<td>Circuito Anterior:</td>
						<td>Designação:</td>
						<td align="center">Visualizar</td>
					</tr>
				</tfoot>		
			</table>
	</div>
	<!-- fim tabela -->
	<div class="row text-right" style="margin-top: 15px;">
		<a href="javascript:history.back();" class="btn btn-success btn-sm" title="voltar">
			<i class="glyphicon glyphicon-arrow-left"></i>
		</a>
	</div>

</div>
@endsection
<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/mov_circuito.js')}}></script>