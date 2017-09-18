@extends('menu')
@section('title', 'Bancos de Dados')

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
	<!-- div painel -->
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Bancos de Dados</h4></div>
			  <div class="panel-body text-right">
			  	<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="novo banco de dados"
			  	data-toggle="modal" data-target="#modal_cad">Novo Banco Dados</button>
			  </div>
			</div>
		</div>
	</div>
	<!-- fim div painel -->

	<!-- alerts -->
	@if(Session::has('retorno'))
	<div class="alert alert-{{Session::get('retorno')['tipo']}} alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<li>{{Session::get('retorno')['msg']}}</li>
	</div>
	@endif
	<!-- fim alerts -->

	<!-- Modal -->
	  <div class="modal fade" id="modal_cad" role="dialog">
	    <div class="modal-dialog modal-md">

	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Cadastro de Banco
	        </div>
	        <div class="modal-body">
	        	<div class="alerta"></div>
	        	<form id="form_banco" method="POST" action="{{route('banco.inserir')}}">
	        		{{ csrf_field() }}
	        		<input type="hidden" name="_insert" value="insert">
	        		<div class="input-group" style="margin-top: 5px;">
					    <span class="input-group-addon">Ambiente:</span>
					    <select class="form-control" id="slc_ambiente" name="ambiente_banco">
					    	<option value="">--SELECIONE--</option>
					    	<option value="Homologação">Homologação</option>
					    	<option value="Treinamento">Treinamento</option>
					    	<option value="Produção">Produção</option>
					    </select>
					</div>

					<div class="input-group" style="margin-top: 5px;">
					    <span class="input-group-addon">Tecnologia:</span>
					    <select class="form-control" id="slc_tecnologia" name="tecnologia_banco">
					    	<option value="">--SELECIONE--</option>
					    	<option value="Oracle">Oracle</option>
					    	<option value="Sql Server">SQL Server</option>
					    	<option value="Postgre SQL">Postgre SQL</option>
					    	<option value="DB2">DB2</option>
					    	<option value="MySQL">MySQL</option>
					    </select>
					</div>

					<div class="input-group" style="margin-top: 5px;">
					    <span class="input-group-addon">IP:</span>
					    <input id="ip" type="text" class="form-control" name="ip_banco" placeholder="IP do banco de dados" maxlength="100">
					</div>

					<div class="input-group" style="margin-top: 5px;">
					    <span class="input-group-addon">Usuário:</span>
					    <input id="usuario" type="text" class="form-control" name="usuario_banco" placeholder="usuário para acesso do banco" maxlength="100">
					</div>

					<div class="input-group" style="margin-top: 5px;">
					    <span class="input-group-addon">Senha:</span>
					    <input id="senha" type="password" class="form-control" name="senha_banco" placeholder="senha para acesso do banco" maxlength="100">
					    <span class="input-group-addon">
					    	<a href="#" id="revela_senha"><i class="glyphicon glyphicon-eye-open"></i></a>
					    </span>
					</div>

					<div class="input-group" style="margin-top: 5px;">
					    <span class="input-group-addon">Schema:</span>
					    <input id="schema" type="text" class="form-control" name="schema_banco" placeholder="nome do banco de dados" maxlength="100">
					</div>

	        	</form>
        	<!-- fim do form -->
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
	          <button type="submit" class="btn btn-success btn-sm" form="form_banco" id="btn_salvar">Salvar</button>
	        </div>
	      </div>

	    </div>
	  </div>
	<!-- fim da modal -->

	<!-- div table -->
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">

				<thead>
	  				<tr>
	  					<th>Schema:</th>
	  					<th>IP:</th>
	  					<th>Ambiente</th>
	  					<th>Visualizar</th>
	  					<th>Editar</th>
	  					<th>Excluir</th>
	  				</tr>
	  			</thead>

	  			<tbody>
	  				@foreach($listaBanco as $bancos)

	  				<tr>
	  					<td>{{ $bancos->schema_banco }}</td>
	  					<td>{{ $bancos->ip_banco }}</td>
	  					<td>{{ $bancos->ambiente_banco }}</td>
	  					<td align="center">
	  						<a href="{{ route('banco.detalhar', $bancos->id_banco) }}" class="btn btn-info btn-sm" title="visualizar">
	  							<i class="glyphicon glyphicon-eye-open"></i>
	  						</a>
	  					</td>
	  					<td align="center">
	  						<a href="{{ route('banco.altera', $bancos->id_banco) }}" class="btn btn-warning btn-sm" title="editar">
	  							<i class="glyphicon glyphicon-edit"></i>
	  						</a>
	  					</td>
	  					<td align="center">
	  						<a href="#" class="btn btn-danger btn-sm" title="excluir"
	  						onclick="confirmaDeleta('{{route('banco.apagar', $bancos->id_banco)}}');">
	  							<i class="glyphicon glyphicon-remove"></i>
	  						</a>
	  					</td>
	  				</tr>

	  				@endforeach
	  			</tbody>

	  			<tfoot>
	  				<tr>
	  					<th>Schema:</th>
	  					<th>IP:</th>
	  					<th>Ambiente</th>
	  					<th>Visualizar</th>
	  					<th>Editar</th>
	  					<th>Excluir</th>
	  				</tr>
	  			</tfoot>

			</table>
		</div>
	</div>
	<!-- fim div table -->

</div>
<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/banco.js')}}></script>
<script type="text/javascript">
    function confirmaDeleta(url){
        if(window.confirm('Deseja realmente apagar o registro?')){
            window.location = url;
        }
    }
</script>

@endsection
