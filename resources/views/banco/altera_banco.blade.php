@extends('menu')
@section('title', 'Altera Banco Dados')

@section('content')

<div class="container" style="margin-top: 60px;">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Altera Banco de Dados</h4></div>
		</div>		
	</div>
	<!-- fim painel -->

	<div class="col-xs-12 col-md-8 col-md-offset-2">
		@foreach($banco as $b)
		<form id="form_banco" method="POST" action="{{route('banco.atualizar', $b->id_banco)}}">
			<div class="alerta"></div>
			{{csrf_field()}}
			<input type="hidden" name="_update" value="update">
    		<div class="input-group" style="margin-top: 5px;">
			    <span class="input-group-addon">Ambiente:</span>			    
			    <select class="form-control" id="slc_ambiente" name="ambiente_banco">
			    	<option value="">--SELECIONE--</option>
			    	<option value="Homologação"
			    	@if($b->ambiente_banco == 'Homologação')
			    	selected
			    	@endif
			    	>Homologação</option>
			    	<option value="Treinamento"
			    	@if($b->ambiente_banco == 'Treinamento')
			    	selected
			    	@endif
			    	>Treinamento</option>
			    	<option value="Produção"
			    	@if($b->ambiente_banco == 'Produção')
			    	selected
			    	@endif
			    	>Produção</option>					    	
			    </select>
			</div>

			<div class="input-group" style="margin-top: 5px;">
			    <span class="input-group-addon">Tecnologia:</span>
			    <select class="form-control" id="slc_tecnologia" name="tecnologia_banco">
			    	<option value="">--SELECIONE--</option>
			    	<option value="Oracle"
			    	@if($b->tecnologia_banco == 'Oracle')
			    	selected
			    	@endif
			    	>Oracle</option>
			    	<option value="Sql Server"
			    	@if($b->tecnologia_banco == 'Sql Server')
			    	selected
			    	@endif
			    	>SQL Server</option>
			    	<option value="Postgre SQL"
			    	@if($b->tecnologia_banco == 'Postgre SQL')
			    	selected
			    	@endif
			    	>Postgre SQL</option>
			    	<option value="DB2"
			    	@if($b->tecnologia_banco == 'DB2')
			    	selected
			    	@endif
			    	>DB2</option>
			    	<option value="MySQL"
			    	@if($b->tecnologia_banco == 'MySQL')
			    	selected
			    	@endif
			    	>MySQL</option>					    	
			    </select>
			</div>

			<div class="input-group" style="margin-top: 5px;">
			    <span class="input-group-addon">IP:</span>
			    <input id="ip" type="text" class="form-control" name="ip_banco" placeholder="IP do banco de dados" maxlength="100" value="{{$b->ip_banco}}">
			</div>

			<div class="input-group" style="margin-top: 5px;">
			    <span class="input-group-addon">Usuário:</span>
			    <input id="usuario" type="text" class="form-control" name="usuario_banco" placeholder="usuário para acesso do banco" maxlength="100" value="{{$b->usuario_banco}}">
			</div>

			<div class="input-group" style="margin-top: 5px;">
			    <span class="input-group-addon">Senha:</span>
			    <input id="senha" type="password" class="form-control" name="senha_banco" placeholder="senha para acesso do banco" maxlength="100" value="{{$b->senha_banco}}">
			    <span class="input-group-addon">
			    	<a href="#" id="revela_senha"><i class="glyphicon glyphicon-eye-open"></i></a>
			    </span>
			</div>

			<div class="input-group" style="margin-top: 5px;">
			    <span class="input-group-addon">Schema:</span>
			    <input id="schema" type="text" class="form-control" name="schema_banco" placeholder="nome do banco de dados" maxlength="100" value="{{$b->schema_banco}}">
			</div>

			@endforeach

			<div class="text-right" style="margin-top: 10px;">
				<a href="javascript:history.back()" class="btn btn-warning btn-sm">Cancelar</a>
				<button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Alterar</button>
			</div>

		</form>
	</div>
	
</div>
<!-- fim do 1º container -->

<script type="text/javascript" src={{asset('js/jquery.js')}} ></script>
<script type="text/javascript" src={{asset('js/banco.js')}} ></script>

@endsection