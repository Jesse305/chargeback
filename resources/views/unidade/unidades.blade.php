@extends('menu')
@section('title', 'Unidades')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Unidades</h4></div>
		  <div class="panel-body text-right">
		  	<button class="btn btn-success btn-sm" id="btn_cad" title="Cadastrar nova Unidade"
		  	data-toggle="modal" data-target="#modal_cad">Nova Unidade</button>
		  </div>
		</div>
	</div>
	<!-- fim painel -->

    <!-- alerts -->
	@if(Session::has('retorno'))
	<div class="alert alert-{{Session::get('retorno')['tipo']}} alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<li>{{Session::get('retorno')['msg']}}</li>
	</div>
	@endif
	<!-- fim alerts -->

	<!-- modal -->

	<div id="modal_cad" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Cadastro de Unidade</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="alert_modal"></div>
	      	<form id="form_unidade" method="POST" 	action={{route('unidade.inserir')}}>
		      	{{csrf_field()}}
		      	<div class="input-group">
		      		<span class="input-group-addon">Órgao:</span>
		      		<select class="form-control" name="orgao_id" id="orgao_id">
		      			<option value="">--Selecione--</option>
		      			@foreach($orgaos as $orgs)
		      			<option value="{{$orgs->id}}"
		      			@if(old('orgao_id') == $orgs->id) selected @endif
		      			>{{$orgs->no_sigla}} - {{$orgs->no_orgao}}</option>
		      			@endforeach
		      		</select>
		      	</div>

		      	<div class="input-group">
		      		<span class="input-group-addon">Nome:</span>
		      		<input class="form-control" type="text" name="no_unidade" id="no_unidade" placeholder="Nome da Unidade"
		      		required maxlength="100" value="{{old('no_unidade')}}">
		      	</div>

		      	<div class="input-group col-xs-6">
		      		<span class="input-group-addon">Sigla:</span>
		      		<input class="form-control" type="text" name="no_sigla" id="no_sigla" placeholder="Sigla da Unidade"
		      		maxlength="45" value="{{old('no_sigla')}}">
		      	</div>

		      	<div class="input-group">
		      		<span class="input-group-addon">Endereço:</span>
		      		<input class="form-control" type="text" name="no_endereco" id="no_endereco"
		      		placeholder="Endereço da Unidade" maxlength="100" required value="{{old('no_endereco')}}">
		      	</div>

		      	<div class="input-group">
		      		<div class="input-group-addon">Cidade:</div>
		      		<select class="form-control" name="cidade_id" id="cidade_id">
		      			<option value="">--Selecione--</option>
		      			@foreach($cidades as $cidade)
		      			<option value="{{$cidade->id}}"
		      			@if(old('cidade_id') == $cidade->id) selected @endif
		      			>{{$cidade->no_cidade}}</option>
		      			@endforeach
		      		</select>
		      	</div>

		      	<div class="input-group col-xs-6">
		      		<span class="input-group-addon">CEP:</span>
		      		<input class="form-control cep" type="text" name="nu_cep" id="nu_cep" maxlength="45"
		      		value="{{old('nu_cep')}}">
		      	</div>
		      	<label for="status">Status: </label>
		      	<label class="radio-inline"><input type="radio" name="status" value="1" checked> Ativo</label>
		      	<label class="radio-inline"><input type="radio" name="status" value="0"> Inativo</label>

	      	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-success btn-sm" form="form_unidade" id="btn_salvar">Salvar</button>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- fim modal -->

	<!-- tabela -->

	<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">

		<thead>
			<tr>
				<td>Sigla:</td>
				<td>Unidade:</td>
				<td>Orgão:</td>
				<td align="center">Ações</td>
			</tr>
		</thead>
		<tbody>

			@foreach($unidades as $unidade)
			<tr>
				<td class="col-xs-1">{{$unidade->no_sigla}}</td>
				<td>{{$unidade->no_unidade}}</td>
				<td>
					{{$unidade->orgao->no_orgao}}
				</td>
				<td class="col-xs-2" align="center">
					<a href={{route('unidade.detalhar', $unidade->id)}} class="btn btn-info btn-sm" title="visualizar">
						<i class="glyphicon glyphicon-eye-open"></i>
					</a>&nbsp;
					<a href={{route('unidade.altera', $unidade->id)}} class="btn btn-warning btn-sm" title="editar">
						<i class="glyphicon glyphicon-edit"></i>
					</a>&nbsp;
					<button disabled class="btn btn-danger btn-sm" title="cuidado! apaga o registro definitivamente."
					onclick="confirmaDeleta('{{route('unidade.apagar', $unidade->id)}}');">
						<i class="glyphicon glyphicon-remove"></i>
					</button>
				</td>
			</tr>
			@endforeach

		</tbody>
		<tfoot>
			<td>Sigla:</td>
			<td>Unidade:</td>
			<td>Orgão:</td>
			<td align="center">Ações</td>
		</tfoot>

	</table>

	<!-- fim tabela -->

</div>
<!-- fim container -->

@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}}></script>
<script type="text/javascript" src={{asset('js/unidade.js')}}></script>
<script type="text/javascript">
	$(document).ready(function($){
		$('.cep').mask('00000-000');
	});
</script>