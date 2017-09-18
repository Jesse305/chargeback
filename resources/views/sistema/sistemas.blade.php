@extends('menu')

@section('title', 'Sistemas')

<style type="text/css">
	.input-group{
		margin-bottom: 5px;
	}
</style>

@section('content')
    <div class="container" style="margin-top: 60px; margin-bottom: 60px;">
    	<!-- painel -->
    	<div class="row">
    		<div class="col-xs-12">
	    		<div class="panel panel-default">
				  <div class="panel-heading"><h4>Sistemas</h4></div>
				  <div class="panel-body text-right">
				  	<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="Cadastrar novo sistema"
				  	data-toggle="modal" data-target="#modal_cad">Novo Sistema</button>
				  </div>
				</div>
    		</div>
    		<!-- /painel -->
    	</div>
    	<!-- /primeira row -->

    	<!-- Modal -->
		<div id="modal_cad" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Cadastro de Sistemas</h4>

		      </div>
		      <div class="modal-body">
		      	<div class="alerta_cad" id="alerta_cad"></div>
		      	<form class="form_cad" id="form_cad" method="POST" action="">
		      		{{csrf_field()}}
		      		<div class="input-group">
		      			<span class="input-group-addon">Nome:</span>
		      			<input class="form-control" type="text" name="no_sistema" id="nome" required maxlength="200"
		      			placeholder="nome do sistema">
		      		</div>

		      		<div class="input-group">
		      			<span class="input-group-addon">Sigla:</span>
		      			<input class="form-control" type="text" name="no_sigla" id="sigla"  maxlength="20"
		      			placeholder="sigla do sistema">
		      		</div>

		      		<div class="dropdown" style="margin-bottom: 5px;">
					  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;" id="dd_devs">Desenvolvedores
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    @foreach($listaDevs as $devs)
					    <li>&nbsp; <input type="checkbox" name="devs[]" value={{$devs->id}}> {{$devs->no_dev}}</li>
					    @endforeach
					  </ul>
					</div>

					<div class="dropdown" style="margin-bottom: 5px;">
					  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Frameworks
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    @foreach($listaFrames as $frames)
					    <li>&nbsp; <input type="checkbox" name="frames[]" value={{$frames->id}} > {{$frames->no_framework}}&nbsp;</li>
					    @endforeach
					  </ul>
					</div>

		      		<div class="input-group">
		      			<span class="input-group-addon">Órgão:</span>
		      			<select class="form-control" name="slc_orgao" id="slc_orgao" title="Órgão solicitante">
		      				<option value="">--Selecione--</option>
		      				@foreach($listaOrgaos as $orgaos)
		      				<option value="{{ $orgaos->id }}">{{ $orgaos->no_sigla }} - {{ $orgaos->no_orgao }}</option>
		      				@endforeach
		      			</select>
		      		</div>

		      		<div class="input-group" id="div_unidade">
		      			<span class="input-group-addon">Unidade:</span>
		      			<select class="form-control" name="slc_unidade" id="slc_unidade" title="Unidade solicitante">
		      				<option value="">--Selecione--</option>
		      			</select>
		      		</div>

		      		<div class="input-group">
		      			<span class="input-group-addon">Banco Dados:</span>
		      			<select class="form-control" name="slc_banco" id="slc_banco" title="Banco de Dados utilizado" >
		      				<option value="">--Selecione--</option>
		      				@foreach($listaBancos as $bancos)
		      				<option value={{$bancos->id_banco}}>SCHEMA: {{$bancos->schema_banco}} / AMBIENTE: {{$bancos->ambiente_banco}}</option>
		      				@endforeach	      				
		      			</select>
		      		</div>
		      		<div class="input-group">
		      			<span class="input-group-addon">Ambientes do Sistema:</span>
		      			<select class="form-control" name="slc_ambSis" id="slc_ambSis" title="Ambientes do sistema">
		      				<option value="">--Selecione--</option>
		      				@foreach($listaAmbientes as $ambientes)
		      				<option value={{$ambientes->id}}>{{$ambientes->desc_amb}}</option>
		      				@endforeach
		      			</select>
		      		</div>


		      		<div class="input-group">
		      			<span class="input-group-addon">Desenvolvimento:</span>
		      			<select class="form-control" name="desenvolvimento" id="slc_amb" title="Ambiente programação">
		      				<option value="">--Selecione--</option>
		      				<option value="Java">Java</option>
		      				<option value="PHP">PHP</option>
		      				<option value="Mobile">Mobile</option>
		      				<option value="Cobol">Cobol</option>
		      			</select>
		      		</div>

		      		<div class="input-group">
		      			<span class="input-group-addon">Acesso:</span>
		      			<select class="form-control" name="tp_acesso" id="slc_acesso" title="Tipo de acesso">
		      				<option value="">--Selecione--</option>
		      				<option value="Externo">Externo</option>
		      				<option value="Interno">Interno</option>
		      			</select>
		      		</div>

		      		<div class="input-group">
		      			<span class="input-group-addon">Status:</span>
		      			<select class="form-control" name="status" id="slc_status" title="">
		      				<option value="">--Selecione--</option>
		      				<option value="Desenvolvimento">Desenvolvimento</option>
		      				<option value="Homologação">Homologação</option>
		      				<option value="Treinamento">Treinamento</option>
		      				<option value="Produção">Produção</option>
		      				<option value="Desuso">Desuso</option>
		      			</select>
		      		</div>

		      	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-success btn-sm btn_salvar" form="form_cad" id="btn_salvar">Salvar</button>
		      </div>
		    </div>

		  </div>
		</div>
		<!-- /modal -->
    </div>
    <!-- /primeiro container -->
    <script type="text/javascript" src={{ asset('js/jquery.js') }}></script>
    <script type="text/javascript" src={{ asset('js/sistema.js') }}></script>
@endsection
