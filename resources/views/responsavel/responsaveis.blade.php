@extends('menu')
@section('title', 'Responsáveis')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Responsáveis</h4></div>
		  <div class="panel-body text-right">
		  	<button class="btn btn-success btn-sm" id="btn_cad" title="Cadastrar novo Responsável"
		  	data-toggle="modal" data-target="#modal_cad">Novo Responsável</button>
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
	        <h4 class="modal-title">Cadastro de Responsável</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="alert_modal"></div>
	      	<form id="form_resp" method="POST" action={{route('responsavel.inserir')}}>
	      		{{csrf_field()}}
	      		<div class="input-group">
	      			<span class="input-group-addon">Órgão</span>
	      			<select class="form-control" name="orgao_id" id="orgao_id">
	      				<option value="">--Selecione--</option>
	      				@foreach($orgaos as $orgao)
	      				<option value={{$orgao->id}}>{{$orgao->no_sigla}} - {{$orgao->no_orgao}}</option>
	      				@endforeach
	      			</select>
	      		</div>
	      		<div class="input-group">
	      			<span class="input-group-addon">Unidade:</span>
	      			<select class="form-control" name="unidade_id" id="unidade_id">
	      				<option value="">--Selecione--</option>
	      			</select>
	      		</div>
	      		<div class="input-group">
	      			<div class="input-group-addon">Nome:</div>
	      			<input class="form-control" type="text" name="no_responsavel" maxlength="100" id="no_responsavel"
	      			value="{{old('no_responsavel')}}">
	      		</div>
	      		<div class="input-group col-xs-6">
	      			<div class="input-group-addon">Telefone:</div>
	      			<input class="form-control" type="text" name="nu_telefone" maxlength="15" id="nu_telefone"
	      			value="{{old('nu_telefone')}}">
	      		</div>
	      		<div class="input-group col-xs-6">
	      			<div class="input-group-addon">Celular:</div>
	      			<input class="form-control" type="text" name="nu_celular" maxlength="15" id="nu_celular"
	      			value="{{old('nu_celular')}}">
	      		</div>
	      		<div class="input-group">
	      			<div class="input-group-addon">E-mail:</div>
	      			<input class="form-control" type="text" name="no_email" maxlength="30" id="no_email"
	      			value="{{old('no_email')}}">
	      		</div>

	      		<label for="status">Status:</label>
	      		<label class="radio-inline"><input type="radio" name="status" value="1" checked> Ativo</label>
	      		<label class="radio-inline"><input type="radio" name="status" value="0" > Inativo</label>

	      		<div class="form-group">
					<label for="ds_observacao">Observações:</label>
					<textarea class="form-control" rows="5" id="ds_observacao" name="ds_observacao">{{old('ds_oservacao')}}</textarea>
				</div>
						
	      	</form>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-success btn-sm" form="form_resp" id="btn_salvar">Salvar</button>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- fim modal -->

	<!-- tabela -->

	<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">
		<thead>
			<tr>
				<td width="250">Órgão:</td>
				<td>Nome:</td>
				<td>Tel. Fixo:</td>
				<td align="center">ações</td>
			</tr>
		</thead>
		<tbody>
			@foreach($responsaveis as $resp)
			<tr>
				<td>
					{{$resp->getOrgao($resp->orgao_id)->no_orgao}}
				</td>
				<td>{{$resp->no_responsavel}}</td>
				<td>{{$resp->nu_telefone}}</td>
				<td align="center">
					<a href={{route('responsavel.detalha', $resp->id)}} class="btn btn-info btn-sm" title="visualizar"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;
					<a href={{route('responsavel.altera', $resp->id)}} class="btn btn-warning btn-sm" title="editar"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
					<button class="btn btn-danger btn-sm" title="cuidado! apaga definitivamente o registro"
					onclick="confirmaDeleta('{{route('responsavel.apagar', $resp->id)}}');" disabled>
						<i class="glyphicon glyphicon-remove"></i>
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td>Órgão:</td>
				<td>Nome:</td>
				<td>Tel. Fixo:</td>
				<td align="center">ações</td>
			</tr>
		</tfoot>
	</table>

	<!-- fim tabela -->

</div>
<!-- fim container -->

@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}}></script>
<script type="text/javascript" src={{asset('js/responsavel.js')}}></script>
<script type="text/javascript">
	$(document).ready(function($){
		$('#nu_telefone').mask('(00) 0000-0000');
		$('#nu_celular').mask('(00) 00000-0000');
	});
</script>
