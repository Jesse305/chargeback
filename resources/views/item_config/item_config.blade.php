@extends('menu')
@section('title', 'Item de Configuração')

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Detalhes do Item de Configuração</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- tabela -->
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td class="col-xs-12 col-md-6"><b>Nome:</b> {{$item->no_item}}</td>
					<td class="col-xs-12 col-md-6"><b>Categoria:</b> {{$categoria->no_categoriaitem}}</td>
				</tr>
				<tr>
					<td class="col-xs-12 col-md-6"><b>Configuração:</b> {{$item->ds_configuracao}}</td>
					<td class="col-xs-12 col-md-6"><b>Custo Mensal:</b> {{$item->nu_custo_mensal}}</td>
				</tr>
				<tr>
					<td class="col-xs-12" colspan="2"><b>Status:</b>
						@if($item->status == 1) Ativo @else Inativo @endif
					</td>
				</tr>
				<tr>
					<td class="col-xs-12 col-md-6"><b>Data Cadastro:</b> {{$item->dt_cadastro}}</td>
					<td class="col-xs-12 col-md-6"><b>Data Atualização:</b>
					@if($item->dt_atualizacao) {{$item->dt_atualizacao}} @else Não atualizado. @endif
					</td>
				</tr>
				<tr>
					<td colspan="2"><b>Descrição:</b> {{$item->ds_descricao}}</td>
				</tr>		
			</table>
		</div>
	</div>
	<!-- fim tabela -->

	<div class="row">
		<div class="col-xs-12 text-right">
			<a href="javascript:history.back();" class="btn btn-success btn-sm" title="voltar">
				<i class="glyphicon glyphicon-arrow-left"></i>
			</a>
		</div>
	</div>

</div>
@endsection