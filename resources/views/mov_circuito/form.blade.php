<link rel="stylesheet" type="text/css" href={{asset('css/bootstrap-datetimepicker.min.css')}}>
<style type="text/css">
	.input-group {
		margin-bottom: 1px;
	}
</style>

@if($errors->any())
<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

{{csrf_field()}}

<input type="hidden" name="circuitompls_id" value="{{$circuito->id}}">

<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Órgão Atual:</span>
			<input class="form-control" type="text" name="no_orgao" id="no_orgao" value="{{$circuito->orgao->no_orgao}}" disabled>
		</div>
		<input type="hidden" name="old_orgao_id" value="{{$circuito->orgao->id}}">
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Novo Órgão:</span>
			<select class="form-control" name="orgao_id" id="orgao_id">
				<option value="">-- Selecione --</option>
				@foreach($orgaos as $o)
				<option value="{{$o->id}}">{{$o->no_orgao}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>
<!-- fim órgão -->
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Unidade Atual:</span>
			<input class="form-control" type="text" name="" id="" value="{{$circuito->unidade->no_unidade}}" disabled>
		</div>
		<input type="hidden" name="old_unidade_id" value="{{$circuito->unidade->id}}">
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Nova Unidade:</span>
			<select class="form-control" name="unidade_id" id="unidade_id">
				<option value="">--Selecione--</option>
			</select>
		</div>
	</div>
</div>
<!-- fim unidade -->
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Responsável Atual:</span>
			<input class="form-control" type="text" name="" id="" value="{{$circuito->getResponsavel($circuito->responsavel_id)->no_responsavel}}" disabled>
		</div>
		<input type="hidden" name="old_responsavel_id" value="{{$circuito->responsavel->id}}">
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Novo Responsável:</span>
			<select class="form-control" name="responsavel_id" id="responsavel_id">
				<option value="">--Selecione--</option>
			</select>
		</div>
	</div>
</div>
<!-- fim responsavel -->
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Item:</span>
			<select class="form-control" name="itemdeconfiguracao_id" id="itemdeconfiguracao_id">
				@foreach($itens as $item)
				<option value="{{$item->id}}"
				{{$circuito->selected($circuito->itemdeconfiguracao_id, $item->id)}}
				{{$circuito->selected(old('itemdeconfiguracao_id'), $item->id)}}
				>{{$item->no_item}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<input type="hidden" name="old_itemdeconfiguracao_id" id="old_itemdeconfiguracao_id" value="{{$circuito->itemdeconfiguracao_id}}">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Designação:</span>
			<input class="form-control" type="text" name="no_designacao" id="no_designacao" value="{{old('no_designacao', isset($circuito) ? $circuito->no_designacao : '')}}">
		</div>
		<input type="hidden" name="old_no_designacao" id="old_no_designacao" value="{{$circuito->no_designacao}}">
	</div>
</div>
<!-- fim item , no_designacao -->
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">IP LAN:</span>
			<input class="form-control nu_ip" type="text" name="ip_lan" id="ip_lan" maxlength="45"
			value="{{old('ip_lan', $circuito->ip_lan)}}">
		</div>
		<input type="hidden" name="old_ip_lan" value="{{$circuito->ip_lan}}">
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">Máscara:</span>
			<input class="form-control nu_ip" type="text" name="ip_mascara" id="ip_mascara"
			value="{{old('ip_mascara', $circuito->ip_mascara)}}">
		</div>
		<input type="hidden" name="old_ip_mascara" value="{{$circuito->ip_mascara}}">
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">WAN Cliente:</span>
			<input class="form-control nu_ip" type="text" name="wan_cliente" id="wan_cliente"
			value="{{old('wan_cliente', $circuito->wan_cliente)}}">
		</div>
		<input type="hidden" name="old_wan_cliente" value="{{$circuito->wan_cliente}}">
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">WAN Operadora:</span>
			<input class="form-control nu_ip" type="text" name="wan_operadora" id="wan_operadora"
			value="{{old('wan_operadora', $circuito->wan_operadora)}}">
		</div>
		<input type="hidden" name="old_wan_operadora" value="{{$circuito->wan_operadora}}">
	</div>
	<div class="col-xs-12 col-md-4">
		<div class='input-group date form-date dtp' data-date="" data-date-format="yyyy-mm-dd" data-link-format="yyyy-mm-dd">
			<span class="input-group-addon">Instalação:</span>
			<input class="form-control" type="text" name="dt_instalacao" id="dt_instalacao" value="{{old('dt_instalacao')}}" readonly>
			<span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
		</div>
		<input type="hidden" name="old_dt_instalacao" value="{{$circuito->dt_instalacao}}">
	</div>
	<div class="col-xs-12 col-md-4">
		<div class='input-group date form-date dtp' data-date="" data-date-format="yyyy-mm-dd" data-link-format="yyyy-mm-dd">
			<span class="input-group-addon">Homologação:</span>
			<input class="form-control" type="text" name="dt_homologacao" id="dt_homologacao" value="{{old('dt_homologacao')}}" readonly>
			<span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
		</div>
		<input type="hidden" name="old_dt_homologacao" value="{{$circuito->dt_homologacao}}">
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-4">
		<label>Observações:</label>
		<textarea class="form-control" rows="5" id="ds_observacao" name="ds_observacao">{{old('ds_observacao')}}</textarea>
	</div>
	<input type="hidden" name="old_ds_observacao" value="{{$circuito->ds_observacao}}">
</div>

<!-- fim formulario -->

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}}></script>
<script type="text/javascript" src={{asset('js/bootstrap-datetimepicker.min.js')}}></script>
<script type="text/javascript" src={{asset('js/locales/bootstrap-datetimepicker.pt-BR.js')}}></script>
<script type="text/javascript" src={{asset('js/circuito_mpls.js')}}></script>
<script type="text/javascript" src={{asset('js/ajax_selects.js')}}></script>