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

	<table class="table table-bordered table-striped table-hover" id="tab_resumo" style="font-size: 12px;">
		<thead>
			<tr>
				<td>Órgão:</td>
				<td>Unidade:</td>
				<td>Circuito:</td>
				<td>Designação:</td>
				<td>Status:</td>
				<td>Movimentação:</td>
				<td align="center" width="150">Ações</td>
			</tr>
		</thead>
		<tbody>
			@foreach($circuitos as $circuito)
			<tr>
				<td>{{$circuito->orgao->no_sigla}}</td>
				<td>{{$circuito->unidade->no_unidade}}</td>
				<td>{{$circuito->itemConfig->no_item}}</td>
				<td>{{$circuito->no_designacao}}</td>
				<td>{{$circuito->printStatus($circuito->status)}}</td>
				<td align="center">
					<a href={{route('movimentacoes_circ', $circuito->id)}} title="movimentação"><i class="glyphicon glyphicon-retweet"></i></a>
				</td>
				<td align="center">
					<a href={{route('circuito_mpls.detalhar', $circuito->id)}} class="btn btn-info btn-sm" title="visualizar" title="editar">
						<i class="glyphicon glyphicon-eye-open"></i>
					</a> &nbsp;
					<a href={{route('circuito_mpls.altera', $circuito->id)}} class="btn btn-warning btn-sm" title="atualizar">
						<i class="glyphicon glyphicon-edit"></i>
					</a>&nbsp;
					<button class="btn btn-danger btn-sm" onclick="confirmaDeleta('{{route('circuito_mpls.apagar', $circuito->id)}}');" title="cuidado! apaga definitivamente o registro." disabled>
						<i class="glyphicon glyphicon-remove"></i>
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
			<tr>
				<td>Órgão:</td>
				<td>Unidade:</td>
				<td>Circuito:</td>
				<td>Designação:</td>
				<td>Status:</td>
				<td>Movimentação:</td>
				<td align="center" width="150">Ações</td>
			</tr>
		<tfoot>

		</tfoot>
	</table>

	<!-- fim tabela -->
</div>
@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/circuito_mpls.js')}}></script>