<link rel="stylesheet" type="text/css" href={{asset('css/bootstrap-formhelpers.min.css')}}>
<style type="text/css">
	.input-group {
		margin-bottom: 1px;
	}
</style>

<link rel="stylesheet" type="text/css" href={{asset('css/bootstrap-datetimepicker.min.css')}}>

{{csrf_field()}}
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Órgão:</span>
			<select class="form-control" name="orgao_id" id="orgao_id">
				<option value="">--Selecione o Órgão--</option>
				@foreach($orgaos as $orgao)
				<option value="{{$orgao->id}}">{{$orgao->no_sigla}} - {{$orgao->no_orgao}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Unidade:</span>
			<select class="form-control" name="unidade_id" id="unidade_id">
				<option value="">--Selecione a Unidade--</option>
			</select>
		</div>
	</div>
</div>
<!-- fim select órgão e unidade -->
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Responsável:</span>
			<select class="form-control" name="responsavel_id" id="responsavel_id">
				<option value="">--Selecione o Responsável--</option>
			</select>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Item:</span>
			<select class="form-control" name="itemdeconfiguracao_id" id="itemdeconfiguracao_id">
				<option value="">--Selecione o Item--</option>
				@foreach($itensConfig as $itemConfig)
				<option value="{{$itemConfig->id}}">{{$itemConfig->no_item}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>
<!-- fim responsavel item circuito -->
<div class="row">
	<div class="col-xs-12 col-md-3">
		<div class="input-group">
			<span class="input-group-addon">Lote:</span>
			<input type="text" class="form-control bfh-number" name="nu_lote" id="nu_lote" data-min="0" data-max="5">
		</div>		
	</div>
	<div class="col-xs-12 col-md-3">
		<div class="input-group">
			<span class="input-group-addon">Nº Usuários:</span>
			<input type="text" class="form-control bfh-number" name="nu_usuarios" id="nu_usuarios" maxlength="11">
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<div class="input-group">
			<span class="input-group-addon">IP LAN:</span>
			<input class="form-control nu_ip" type="text" name="nu_iplan" id="nu_iplan" maxlength="15">
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<div class="input-group">
			<span class="input-group-addon">Máscara:</span>
			<input class="form-control nu_ip" type="text" name="nu_mascara" id="nu_mascara" maxlength="15">
		</div>
	</div>
</div>
<!-- fim lote, nu_usuarios, ip lan, máscara -->
<div class="row">
	<div class="col-xs-12 col-md-3">
		<div class="input-group">
			<span class="input-group-addon">WAN Cliente:</span>
			<input class="form-control nu_ip" type="text" name="wan_cliente" id="wan_cliente" maxlength="15">
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<div class="input-group">
			<span class="input-group-addon">WAN Operadora:</span>
			<input class="form-control nu_ip" type="text" name="wan_operadora" id="wan_operadora" maxlength="15">
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="input-group">
			<span class="input-group-addon">Faixa DHCP:</span>
			<input class="form-control" type="text" name="nu_dhcp" id="nu_dhcp" maxlength="45">
		</div>
	</div>
</div>
<!-- fim wan cliente, operadora e faixa dhcp -->
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class='input-group date form-date dtp' data-date="" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
			<span class="input-group-addon">Instalação:</span>
            <input type='text' class="form-control" name="dt_instalacao" id="dt_instalacao" value="" readonly />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>        
	</div>
	<div class="col-xs-12 col-md-4">
		<div class='input-group date form-date dtp' data-date="" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
			<span class="input-group-addon">Homologação:</span>
            <input type='text' class="form-control" name="dt_homologacao" id="dt_homologacao" value="" readonly />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>		
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="input-group">
			<span class="input-group-addon">Nº Designação:</span>
			<input class="form-control" type="text" name="no_designacao" id="no_designacao" maxlength="30">
		</div>
	</div>
</div>
<!-- fim data instalação, homologação e designação -->

<div class="row">
	<div class="col-xs-12 col-md-6">
		<label for="status">Status:</label>
		<label class="radio-inline"><input type="radio" name="status" id="status" value="1" checked> Ativo</label>
		<label class="radio-inline"><input type="radio" name="status" id="status" value="0"> Inativo</label>
	</div>
</div>
<!-- fim status -->
<div class="row">
	<div class="form-group col-xs-12 col-md-6">
		<label for="ds_observacao">Observações:</label>
		<textarea class="form-control" rows="5" id="ds_observacao" name="ds_observacao"></textarea>
	</div>
</div>

<!-- scripts do formulário -->
<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/bootstrap-formhelpers.min.js')}}></script>
<script type="text/javascript" src={{asset('js/bootstrap-datetimepicker.min.js')}}></script>
<script type="text/javascript" src={{asset('js/locales/bootstrap-datetimepicker.pt-BR.js')}}></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}}></script>
<script type="text/javascript" src={{asset('js/circuito_mpls.js')}}></script>
<script type="text/javascript" src={{asset('js/ajax_selects.js')}}></script>