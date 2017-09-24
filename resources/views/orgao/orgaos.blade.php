@extends('menu')
@section('title', 'Orgãos')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Órgãos</h4></div>
		  <div class="panel-body text-right">
		  	<button class="btn btn-success btn-sm" id="btn_cad" title="Cadastrar novo Órgão" 
		  	data-toggle="modal" data-target="#modal_cad">Novo Órgão</button>
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
	        <h4 class="modal-title">Cadastro Órgão</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="alert_form" id="alert_form"></div>
	      	<form id="form_orgao" method="POST" action={{route('orgao.inserir')}}>
	      	  {{csrf_field()}}
      		  <div class="input-group">
			    <span class="input-group-addon">Nome:</span>
			    <input id="no_orgao" type="text" class="form-control" name="no_orgao" placeholder="Nome do Orgão"
			    required maxlength="100">
			  </div>

			  <div class="input-group">	
		    	<span class="input-group-addon">Sigla:</span>
		    	<input id="no_sigla" type="text" class="form-control" name="no_sigla" placeholder="Sigla do Orgão"
		    	required maxlength="15" onkeyup="maiuscula(this);">			    
			  </div>

			  <div class="input-group">
			  	<span class="input-group-addon">Tipo:</span>
			  	<select class="form-control" name="tp_orgao" id="tp_orgao">
			  		<option value="">--Selecione--</option>
			  		<option value="0">Administração Direta</option>
			  		<option value="1">Administração Indireta</option>
			  	</select>
			  </div>

			  <div class="input-group">
			  	<span class="input-group-addon">Status:</span>
			  	<select class="form-control" name="status" id="status">
			  		<option value="">--Selecione--</option>
			  		<option value="1">Ativo</option>
			  		<option value="0">Inativo</option>
			  	</select>
			  </div>

	      	</form>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-success btn-sm" form="form_orgao" id="btn_salvar">Salvar</button>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- fim modal -->

	<!-- tabela -->

	<div class="row">		
		<div class="col-xs-12">
			<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">
				<thead>
					<tr>
						<td>Órgão:</td>
						<td>Sigla:</td>
						<td>Status:</td>
						<td>Ações</td>
					</tr>
				</thead>

				<tbody>

					@foreach($orgaos as $orgs)
					<tr>
						<td>{{$orgs->no_orgao}}</td>
						<td>{{$orgs->no_sigla}}</td>
						<td>
							@if($orgs->status == 1)
							Ativo
							@elseif($orgs->status == 0)
							Inativo
							@endif
						</td>
						<td align="center">
							<a href={{route('orgao.detalhar', $orgs->id)}} class="btn btn-info btn-sm" title="visualizar">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a> &nbsp;
							<a href={{route('orgao.altera', $orgs->id)}} class="btn btn-warning btn-sm" title="editar">
								<i class="glyphicon glyphicon-edit"></i>
							</a> &nbsp;
							<button class="btn btn-danger btn-sm" title="cuidado! apaga o registro definitivamente."
							onclick="confirmaDeleta('{{route('orgao.apagar', $orgs->id)}}');" disabled>
								<i class="glyphicon glyphicon-remove"></i>
							</button>
						</td>
					</tr>
					@endforeach
					
				</tbody>

				<tfoot>
					<tr>
						<td>Órgão:</td>
						<td>Sigla:</td>
						<td>Status:</td>
						<td>Ações</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<!-- fim tabela -->

</div>
<!-- fim container -->

@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}} ></script>
<script type="text/javascript" src={{asset('js/orgao.js')}} ></script>