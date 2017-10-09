<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

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
<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/circuito_mpls.js')}}></script>
<script type="text/javascript" src={{asset('js/ajax_selects.js')}}></script>