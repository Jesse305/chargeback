@extends('menu')
@section('title', 'Circuitos MPLS')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Circuitos MPLS</h4></div>
			<div class="panel-body">
				<div class="text-right">
					<a href={{route('circuito_mpls.novo')}} class="btn btn-success btn-sm" id="btn_novo">Novo Circuito MPLS</a>
				</div>
			</div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- tabela -->

	<table class="table table-bordered table-striped table-hover" id="tab_resumo" style="font-size: 12px;">
		<thead>
			<tr>
				<td>Órgão:</td>
				<td>Unidade:</td>
				<td>Circuito:</td>
				<td>Designação</td>
				<td>Status:</td>
				<td align="center" width="150">Ações</td>
			</tr>
		</thead>
		<tbody>
			@foreach($circuitos as $circuito)
			<tr>
				<td>{{$circuito->getOrgao($circuito->orgao_id)->no_sigla}}</td>
				<td>{{$circuito->getUnidade($circuito->unidade_id)->no_unidade}}</td>
				<td>{{$circuito->getItemConfig($circuito->itemdeconfiguracao_id)->no_item}}</td>
				<td>{{$circuito->no_designacao}}</td>
				<td>{{$circuito->printStatus($circuito->status)}}</td>
				<td align="center">
					<a href={{route('circuito_mpls.detalhar', $circuito->id)}} class="btn btn-info btn-sm" title="visualizar" title="editar">
						<i class="glyphicon glyphicon-eye-open"></i>
					</a> &nbsp;
					<a href={{route('circuito_mpls.altera', $circuito->id)}} class="btn btn-warning btn-sm" title="atualizar">
						<i class="glyphicon glyphicon-edit"></i>
					</a>&nbsp;
					<button class="btn btn-danger btn-sm" onclick="confirmaDeleta('#');" title="cuidado! apaga definitivamente o registro.">
						<i class="glyphicon glyphicon-remove"></i>
					</button>					
				</td>
			</tr>
			@endforeach			
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>

	<!-- fim tabela -->
</div>
@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/circuito_mpls.js')}}></script>