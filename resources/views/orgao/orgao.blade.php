@extends('menu')
@section('title', 'Orgão')

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Detalhes Orgão</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- tabela -->
	<div class="row">		
		<div class="col-xs-12">
			<table class="table table-striped table-bordered table-hover" id="tab_resumo">
				@foreach($orgao as $org)
				<tr>
					<td><b>Sigla: </b>{{$org->no_sigla}}</td>
					<td><b>Nome: </b>{{$org->no_orgao}}</td>
				</tr>
				<tr>
					<td><b>Tipo Orgão: </b>
						@if($org->tp_orgao == 0)
						Adiministração Direta
						@elseif($org->tp_orgao == 1)
						Administração Indireta
						@endif
					</td>
					<td><b>Status:</b>
						@if($org->status == 0)
						Inativo
						@elseif($org->status == 1)
						Ativo
						@endif
					</td>
				</tr>
				<tr>
					<td><b>Data/Hora Cadastro:</b>
						@if($org->dt_cadastro)
						{{$org->dt_cadastro}}
						@else
						Informação não disponível.
						@endif
					</td>
					<td><b>Data/Hora Atualização:</b>
						@if($org->dt_atualizacao)
						{{$org->dt_atualizacao}}
						@else
						Informação não disponível.
						@endif
					</td>
				</tr>
				@endforeach		
			</table>
		</div>
	</div>
	<!-- fim tabela -->

	<div class="text-right">
		<a href="javascript:history.back()" class="btn btn-success btn-sm" title="voltar">
			<span class="glyphicon glyphicon-arrow-left"></span>
		</a>
	</div>
	
</div>
<!-- fim container -->

@endsection