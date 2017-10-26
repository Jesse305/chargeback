{{csrf_field()}}		      			
<div class="input-group">
	<span class="input-group-addon">Nome:</span>
	<input class="form-control" type="text" name="no_sistema" id="nome" required maxlength="200"
	placeholder="nome do sistema" onkeyup="maiuscula(this);" 
	value="{{old('no_sistema', isset($sistema) ? $sistema->no_sistema : '')}}">
</div>

<div class="input-group">
	<span class="input-group-addon">Sigla:</span>
	<input class="form-control" type="text" name="no_sigla" id="sigla"  maxlength="20"
	placeholder="sigla do sistema" onkeyup="maiuscula(this);" 
	value="{{old('no_sigla', isset($sistema) ? $sistema->no_sigla : '')}}">
</div>

<div class="dropdown" style="margin-bottom: 5px;">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;" id="dd_devs">Desenvolvedores
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    @foreach($listaDevs as $devs)
    <li>&nbsp; <input type="checkbox" name="devs[]" value={{$devs->id}}
    @if(isset($sistema))
    	@foreach($sistema->desenvolvedores as $d)
    		@if($d->id == $devs->id) checked @endif
    	@endforeach
    @endif
    > {{$devs->no_dev}}</li>
    @endforeach
  </ul>
</div>

<div class="dropdown" style="margin-bottom: 5px;">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Frameworks
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    @foreach($listaFrames as $frames)
    <li>&nbsp; <input type="checkbox" name="frames[]" value={{$frames->id}} 
    @if(isset($sistema))
    	@foreach($sistema->frameworks as $f)
    		@if($f->id == $frames->id) checked @endif
    	@endforeach
    @endif
    > {{$frames->no_framework}}&nbsp;</li>
    @endforeach
  </ul>
</div>

<div class="input-group">
	<span class="input-group-addon">Órgão:</span>
	<select class="form-control" name="id_orgao" id="orgao_id" title="Órgão solicitante">
		<option value="">--Selecione--</option>
		@foreach($listaOrgaos as $orgaos)
		<option value="{{ $orgaos->id }}"
		@if(isset($sistema))
			@if($sistema->orgao->id == $orgaos->id) selected @endif
		@endif
		>{{ $orgaos->no_sigla }} - {{ $orgaos->no_orgao }}</option>
		@endforeach
	</select>
</div>

<div class="input-group" id="div_unidade">
	<span class="input-group-addon">Unidade:</span>
	<select class="form-control" name="id_unidade" id="unidade_id" title="Unidade solicitante">
		<option value="">--Selecione--</option>
		@if(isset($sistema))
			<option value="{{$sistema->unidade->id}}" selected>{{$sistema->unidade->no_unidade}}</option>
		@endif
	</select>
</div>

<div class="input-group">
	<span class="input-group-addon">Responsável:</span>
	<select class="form-control" name="responsavel_id" id="responsavel_id" title="selecione o responsável">
		<option value="">--Selecione--</option>
		@if(isset($sistema))
			<option value="{{$sistema->responsavel->id}}" selected>{{$sistema->responsavel->no_responsavel}}</option>
		@endif
	</select>
</div>

<!-- inicio banco dados -->

@if(isset($sistema))
	<input type="hidden" name="id_banco[]" value="0">
	@foreach($sistema->bancos as $edtBancos)

		<div class="input-group" id="div_edtBanco">
			<input type="hidden" name="id_banco[]" id="id_edt_banco" value="{{$edtBancos->id_banco}}">
			<span class="input-group-addon">Banco Dados:</span>
			<input class="form-control" type="text" value="Schema: {{$edtBancos->schema_banco}} / Ambiente: {{$edtBancos->ambiente_banco}}"
			readonly>
			<span class="input-group-addon">
				<a href="" onclick="return false;" class="btn btn-xs text-danger remove_bd" title="excluir">
					<i class="glyphicon glyphicon-remove"></i>
				</a>
			</span>					
		</div>
	@endforeach
@else
<div class="input-group">
		<span class="input-group-addon">Banco Dados:</span>
		<select class="form-control" name="id_banco[]" id="slc_banco" title="Banco de Dados utilizado" >
			<option value="">--Selecione--</option>
			@foreach($listaBancos as $bancos)
			<option value={{$bancos->id_banco}}
			@if(old('id_banco') == $bancos->id_banco) selected @endif
			>SCHEMA: {{$bancos->schema_banco}} / AMBIENTE: {{$bancos->ambiente_banco}}</option>
			@endforeach	      				
		</select>
	</div>		
@endif
<div id="bancos"></div>

<div class="text-right" style="margin-top: 5px; margin-bottom: 5px;">
	<b><i>Adicionar/Remover Banco de Dados?</i></b>
	<button class="btn btn-success btn-sm" onclick="return false;" id="adiciona" title="adicionar mais um banco de dados">
			<i class="glyphicon glyphicon-plus"></i>
		</button>
		<button class="btn btn-danger btn-sm" onclick="return false;" id="btn_remove" title="remover">
			<i class="glyphicon glyphicon-minus"></i>
		</button>	      				
</div>


<!-- fim banco dados -->

<div class="input-group">
	<span class="input-group-addon">Ambientes do Sistema:</span>
	<select class="form-control" name="id_amb" id="slc_ambSis" title="Ambientes do sistema">
		<option value="">--Selecione--</option>
		@foreach($listaAmbientes as $ambientes)
		<option value={{$ambientes->id}}
		@if(isset($sistema))
			@if($sistema->ambiente->id == $ambientes->id) selected @endif
		@endif
		>{{$ambientes->desc_amb}}</option>
		@endforeach
	</select>
</div>


<div class="input-group">
	<span class="input-group-addon">Desenvolvimento:</span>
	<select class="form-control" name="desenvolvimento" id="slc_amb" title="Ambiente programação">
		<option value="">--Selecione--</option>
		<option value="Java"
		@if(isset($sistema))
			@if($sistema->desenvolvimento == 'Java') selected @endif
		@endif	
		>Java</option>
		<option value="PHP"
		@if(isset($sistema))
			@if($sistema->desenvolvimento == 'PHP') selected @endif
		@endif
		>PHP</option>
		<option value="Mobile"
		@if(isset($sistema))
			@if($sistema->desenvolvimento == 'Mobile') selected @endif
		@endif
		>Mobile</option>
		<option value="Cobol"
		@if(isset($sistema))
			@if($sistema->desenvolvimento == 'Cobol') selected @endif
		@endif
		>Cobol</option>
	</select>
</div>

<div class="input-group">
	<span class="input-group-addon">Acesso:</span>
	<select class="form-control" name="tp_acesso" id="slc_acesso" title="Tipo de acesso">
		<option value="">--Selecione--</option>
		<option value="Externo"
		@if(isset($sistema))
			@if($sistema->tp_acesso == 'Externo') selected @endif
		@endif
		>Externo</option>
		<option value="Interno"
		@if(isset($sistema))
			@if($sistema->tp_acesso == 'Interno') selected @endif
		@endif
		>Interno</option>
	</select>
</div>

<div class="input-group">
	<span class="input-group-addon">Status:</span>
	<select class="form-control" name="status" id="slc_status" title="">
		<option value="">--Selecione--</option>
		<option value="Desenvolvimento"
		@if(isset($sistema))
			@if($sistema->status == 'Desenvolvimento') selected @endif
		@endif
		>Desenvolvimento</option>
		<option value="Homologação"
		@if(isset($sistema))
			@if($sistema->status == 'Homologação') selected @endif
		@endif 
		>Homologação</option>
		<option value="Treinamento"
		@if(isset($sistema))
			@if($sistema->status == 'Treinamento') selected @endif
		@endif
		>Treinamento</option>
		<option value="Produção"
		@if(isset($sistema))
			@if($sistema->status == 'Produção') selected @endif
		@endif
		>Produção</option>
		<option value="Desuso"
		@if(isset($sistema))
			@if($sistema->status == 'Desuso') selected @endif
		@endif
		>Desuso</option>
	</select>
</div>