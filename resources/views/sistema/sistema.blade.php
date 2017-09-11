@extends('menu')

@section('title', 'Sistema')

@section('content')
    <div class="container" style="margin-top: 60px;">
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
		      	<form class="form_cad" id="form_cad" method="POST" action="">

		      		<div class="input-group" style="margin-top: 5px;">
		      			<span class="input-group-addon">Nome:</span>
		      			<input class="form-control" type="text" name="nome" id="nome" required maxlength="200">
		      		</div>

		      		<div class="input-group" style="margin-top: 5px;">
		      			<span class="input-group-addon">Sigla:</span>
		      			<input class="form-control" type="text" name="sigla" id="sigla" maxlength="20">
		      		</div>

		      		<div class="input-group" style="margin-top: 5px;">
		      			<span class="input-group-addon">Órgão:</span>
		      			<select class="form-control" name="slc_orgao" id="slc_orgao" title="Órgão solicitante">
		      				<option value="">--Selecione--</option>
		      			</select>
		      		</div>

		      		<div class="input-group" style="margin-top: 5px;">
		      			<span class="input-group-addon">Unidade:</span>
		      			<select class="form-control" name="slc_unidade" id="slc_unidade" title="Unidade solicitante">
		      				<option value="">--Selecione--</option>
		      			</select>
		      		</div>

		      		<div class="input-group" style="margin-top: 5px;">
		      			<span class="input-group-addon">Ambiente:</span>
		      			<select class="form-control" name="slc_amb" id="slc_amb" title="Ambiente programação">
		      				<option value="">--Selecione--</option>
		      				<option value="Java">Java</option>
		      				<option value="PHP">PHP</option>
		      				<option value="Mobile">Mobile</option>
		      				<option value="Cobol">Cobol</option>
		      			</select>
		      		</div>

		      		<div class="form-group" style="margin-top: 5px;">
		      			<label for="frames">Frameworks:</label>
		      			<textarea placeholder="framework 1, framework 2, ..." class="form-control" id="frames" name="frames"></textarea>
		      		</div>
		      		
		      	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-success btn-sm btn_salvar" form="form_cad" id="btn_salvar">Salvar</button>
		      </div>
		    </div>

		  </div>
		</div>
		<!-- /modal -->
    </div>
    <!-- /primeiro container -->
@endsection