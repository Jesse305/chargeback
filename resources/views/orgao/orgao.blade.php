@extends('menu')
@section('title', 'Orgão')

@section('content')

<div class="container">
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
				
				<tr>
					<td><b>Sigla: </b>{{$orgao->no_sigla}}</td>
					<td><b>Nome: </b>{{$orgao->no_orgao}}</td>
				</tr>
				<tr>
					<td><b>Tipo Orgão: </b>
						@if($orgao->tp_orgao == 0)
						Adiministração Direta
						@elseif($orgao->tp_orgao == 1)
						Administração Indireta
						@endif
					</td>
					<td><b>Status:</b>
						@if($orgao->status == 0)
						Inativo
						@elseif($orgao->status == 1)
						Ativo
						@endif
					</td>
				</tr>
				<tr>
					<td><b>Data/Hora Cadastro:</b>
						@if($orgao->dt_cadastro)
						{{$orgao->dt_cadastro}}
						@else
						Informação não disponível.
						@endif
					</td>
					<td><b>Data/Hora Atualização:</b>
						@if($orgao->dt_atualizacao)
						{{$orgao->dt_atualizacao}}
						@else
						Informação não disponível.
						@endif
					</td>
				</tr>		
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