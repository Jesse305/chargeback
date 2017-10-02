@extends('menu')
@section('title', 'Altera Sistema')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Alterar Sistema</h4></div>
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
	<div class="row">
		<div class="col-xs-12">
			<div class="alerta" id="alerta"></div>
			<form id="form_sis" method="POST" action={{route('sistema.atualizar', $sistema->id)}}>
				{{csrf_field()}}
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
			      			<span class="input-group-addon">Sigla:</span>
			      			<input class="form-control" type="text" name="no_sigla" id="sigla"  maxlength="20"
			      			placeholder="sigla do sistema" onkeyup="maiuscula(this);"
			      			value="{{$sistema->no_sigla}}">
			      		</div>
					</div>
					<div class="col-xs-12 col-md-8">
						<div class="input-group">
			      			<span class="input-group-addon">Nome:</span>
			      			<input class="form-control" type="text" name="no_sistema" id="nome" required maxlength="200"
			      			placeholder="nome do sistema" onkeyup="maiuscula(this);"
			      			value="{{$sistema->no_sistema}}">
			      		</div>
					</div>
				</div>
				<!-- fim row 1 -->

				<div class="row">
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
			      			<span class="input-group-addon">Desenvolvimento:</span>
			      			<select class="form-control" name="desenvolvimento" id="slc_amb" title="Ambiente programação">
			      				<option value="Java"
			      				@if($sistema->desenvolvimento == 'Java')
			      				selected			      				
			      				@endif 
			      				>Java</option>
			      				<option value="PHP"
			      				@if($sistema->desenvolvimento == 'PHP')
			      				selected			      				
			      				@endif 
			      				>PHP</option>
			      				<option value="Mobile"
			      				@if($sistema->desenvolvimento == 'Mobile')
			      				selected			      				
			      				@endif 
			      				>Mobile</option>
			      				<option value="Cobol"
			      				@if($sistema->desenvolvimento == 'Cobol')
			      				selected			      				
			      				@endif 
			      				>Cobol</option>
			      			</select>
			      		</div>
					</div>

					<div class="col-xs-12 col-md-4">
						<div class="input-group">
			      			<span class="input-group-addon">Acesso:</span>
			      			<select class="form-control" name="tp_acesso" id="slc_acesso" title="Tipo de acesso">
			      				<option value="Externo"
			      				@if($sistema->tp_acesso == 'Externo')
			      				selected
			      				@endif
			      				>Externo</option>
			      				<option value="Interno"
			      				@if($sistema->tp_acesso == 'Interno')
			      				selected
			      				@endif
			      				>Interno</option>
			      			</select>
			      		</div>
					</div>

					<div class="col-xs-12 col-md-4">
						<div class="input-group">
			      			<span class="input-group-addon">Status:</span>
			      			<select class="form-control" name="status" id="slc_status" title="">
			      				<option value="Desenvolvimento"
			      				@if($sistema->status == 'Desenvolvimento')
			      				selected
			      				@endif
			      				>Desenvolvimento</option>
			      				<option value="Homologação"
			      				@if($sistema->status == 'Homologação')
			      				selected
			      				@endif
			      				>Homologação</option>
			      				<option value="Treinamento"
			      				@if($sistema->status == 'Treinamento')
			      				selected
			      				@endif
			      				>Treinamento</option>
			      				<option value="Produção"
			      				@if($sistema->status == 'Produção')
			      				selected
			      				@endif
			      				>Produção</option>
			      				<option value="Desuso"
			      				@if($sistema->status == 'Desuso')
			      				selected
			      				@endif
			      				>Desuso</option>
			      			</select>
			      		</div>
					</div>
				</div>
				<!-- fim row 2			 -->

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
			      			<span class="input-group-addon">Órgão:</span>
			      			<select class="form-control" name="id_orgao" id="slc_orgao" title="Órgão solicitante">
			      				<option value="">--Selecione--</option>
			      				@foreach($orgaos as $org)
			      				<option value="{{$org->id}}" 			      				
			      				@if($org->id == $sistema->id_orgao)
			      				selected
			      				@endif			      				
			      				>{{$org->no_sigla}} - {{$org->no_orgao}}</option>
			      				@endforeach
			      			</select>
			      		</div>						
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="input-group" id="div_unidade">
			      			<span class="input-group-addon">Unidade:</span>
			      			<select class="form-control" name="id_unidade" id="slc_unidade" title="Unidade solicitante" >
			      				<option value="{{$unidade[0]->id}}">{{$unidade[0]->no_unidade}}</option>
			      			</select>
			      		</div>						
					</div>
					
				</div>
				<!-- fim row 3 -->

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
			      			<span class="input-group-addon">Banco Dados:</span>
			      			<select class="form-control" name="id_banco" id="slc_banco" title="Banco de Dados utilizado" >     @foreach($bancos as $b)
			      				<option value="{{$b->id_banco}}"
			      				@if($b->id_banco == $sistema->id_banco)
			      				selected
			      				@endif
			      				>SCHEMA : {{$b->schema_banco}} / AMB.: {{$b->ambiente_banco}}</option>
			      			@endforeach
			      			</select>
			      		</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="input-group">
			      			<span class="input-group-addon">Ambiente:</span>
			      			<select class="form-control" name="id_amb" id="slc_ambSis" title="Ambientes do sistema">
			      				@foreach($ambientes as $amb)
			      				<option value="{{$amb->id}}"
			      				@if($amb->id == $sistema->id_amb)
			      				selected
			      				@endif
			      				> {{$amb->desc_amb}}</option>
			      				@endforeach
			      			</select>
			      		</div>
					</div>
				</div>

	      	<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;" id="dd_devs">Desenvolvedores
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						  	@foreach($devs as $dev)
						  	<li>&nbsp; <input type="checkbox" name="devs[]" value={{$dev->id}}
						  		@foreach($slcDevs as $sd)
						  			@if($sd->id_dev == $dev->id)
						  				checked
						  			@endif
						  		@endforeach
						  	> {{$dev->no_dev}}</li>
						  	@endforeach
						  </ul>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Frameworks
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						  @foreach($frames as $f)
						  <li>&nbsp; <input type="checkbox" name="frames[]" value={{$f->id}}
						  @foreach($slcFrames as $sf)
						  	@if($sf->id_framework == $f->id)
						  		checked
						  	@endif
						  @endforeach
						  > {{$f->no_framework}} </li>
						  @endforeach
						  </ul>
						</div>						
					</div>
				</div>

				<div class="text-right" style="margin-top: 20px;">
					<a href="javascript: history.back();" class="btn btn-warning btn-sm">Cancelar</a>
					<button class="btn btn-success btn-sm" type="input" id="btn_alterar">Alterar</button>
				</div>
				
			</form>
			
		</div>	
	</div>

</div>
<!-- fim container -->
@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}} ></script>
<script type="text/javascript" src={{asset('js/alt_sistema.js')}} ></script>
