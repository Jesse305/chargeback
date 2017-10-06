<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Órgão</span>
			<select class="form-control" name="orgao_id" id="orgao_id">
				<option value="">--Selecione o órgão--</option>
				@foreach($orgaos as $orgao)
				<option value="{{$orgao->id}}"
				@if(isset($serv_vm))
					@if($serv_vm->orgao_id == $orgao->id) selected @endif
				@endif
				> {{$orgao->no_sigla}} - {{$orgao->no_orgao}}</option>
				@endforeach
			</select>
		</div>	
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Unidade:</span>
			<select class="form-control" name="unidade_id" id="unidade_id">
				@if(isset($serv_vm))
					@if(count($unidade) > 0)
						<option value="{{$unidade->id}}">{{$unidade->no_unidade}}</option>
					@else
						<option value="0">Unidade não encontrada.</option>
					@endif
				@else
				<option value="">--Selecione a unidade--</option>
				@endif
			</select>
		</div>
	</div>
</div>
<!-- fim orgãos e unidades -->
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Responsável:</span>
			<select class="form-control" name="responsavel_id" id="responsavel_id">
				@if(isset($serv_vm))
					@if(count($responsavel))
						<option value="{{$responsavel->id}}">{{$responsavel->no_responsavel}}</option>
					@else
						<option value="0">Responsável não encontrado.</option>
					@endif
				@else
				<option value="">--Selecione o responsável--</option>
				@endif
			</select>
		</div>		
	</div>
</div>
<!-- fim responsavel -->
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">Nome:</span>
			<input class="form-control" type="text" name="no_servidor" id="no_servidor" 
			value="{{old('no_servidor', isset($serv_vm->no_servidor) ? $serv_vm->no_servidor : '')}}" maxlength="50">
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">IP:</span>
			<input class="form-control" type="text" name="ip_endereco" id="ip_endereco" 
			value="{{old('ip_endereco', isset($serv_vm->ip_endereco) ? $serv_vm->ip_endereco : '')}}" maxlength="45">
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">DNS:</span>
			<input class="form-control" type="text" name="no_dns" id="no_dns" 
			value="{{old('no_dns', isset($serv_vm->no_dns) ? $serv_vm->no_dns : '')}}" maxlength="45">
		</div>
	</div>
</div>
<!-- fim nome, ip, dns -->
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">CPU Count:</span>
			<input class="form-control" type="text" name="nu_cpu" id="nu_cpu" 
			value="{{old('nu_cpu', isset($serv_vm->nu_cpu) ? $serv_vm->nu_cpu : '')}}" maxlength="11">
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">Espaço SAS:</span>
			<input class="form-control" type="text" name="nu_espaco_sas" id="nu_espaco_sas" 
			value="{{old('nu_espaco_sas', isset($serv_vm->nu_espaco_sas) ? $serv_vm->nu_espaco_sas : '')}}" maxlength="11">
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">Espaço SATA:</span>
			<input class="form-control" type="text" name="nu_espaco_sata" id="nu_espaco_sata" 
			value="{{old('nu_espaco_sata', isset($serv_vm->nu_espaco_sata) ? $serv_vm->nu_espaco_sata : '')}}" maxlength="11">
		</div>
	</div>
</div>
<!-- fim cpu count, esp. sas, esp. sata -->
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Cloud Server:</span>
			<select class="form-control" name="cloud_server" id="cloud_server">
				<option value="">-- Selecione o Cloud Server --</option>
				@foreach($clouds as $cloud)
				<option value="{{$cloud->no_item}}"
				@if(old('cloud_server') == $cloud->no_item) selected 
				@elseif(isset($serv_vm))
					@if($serv_vm->cloud_server == $cloud->no_item) selected @endif
				@endif
				>{{$cloud->no_item}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Sis. Operacional:</span>
			<select class="form-control" name="sis_operacional" id="sis_operacional">
				<option value="">-- Selecione o S.O. --</option>
				@foreach($sis_ops as $sis_op)
				<option value="{{$sis_op->no_item}}"
				@if(old('sis_operacional') == $sis_op->no_item) selected @endif
				@if(isset($serv_vm))
					@if($serv_vm->sis_operacional == $sis_op->no_item) selected @endif
				@endif
				> {{$sis_op->no_item}} </option>
				@endforeach
			</select>
		</div>
	</div>
</div>
<!-- fim cloud e s.o.  -->
<div class="row">
	<div class="col-xs-12">
		<label for="status">Status</label>
		<label class="radio-inline"><input type="radio" name="status" id="status" value="1" checked>Ativo</label>
		<label class="radio-inline"><input type="radio" name="status" id="status" value="0"
		@if(old('status') == '0') checked @endif
		@if(isset($serv_vm))
			@if($serv_vm->status == '0') checked @endif
		@endif>Inativo</label>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="form-group">
		  <label for="ds_observacao">Observações:</label>
		  <textarea class="form-control" rows="5" id="ds_observacao" name="ds_observacao">{{old('ds_observacao')}}{{isset($serv_vm) ? $serv_vm->ds_observacao : ''}}</textarea>
		</div> 
	</div>
</div>

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/serv_vm.js')}}></script>