@extends('menu')
@section('title', 'Altera Unidade')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Alterar Cadastro Unidade</h4></div>
			</div>
		</div>
	</div>
	<!-- fim painel -->

	<div class="row">
		<div class="col-xs-12">

			<form id="form_unidade" method="POST" action={{route('unidade.atualizar', $unidade->id)}}>
				{{csrf_field()}}
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Órgão:</span>
							<input class="form-control" type="text" name="no_orgao" value="{{$unidade->orgao->no_orgao}}" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Nome:</span>
							<input class="form-control" type="text" name="no_unidade" value="{{$unidade->no_unidade}}" maxlength="100" required>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
							<div class="input-group-addon">Sigla:</div>
							<input class="form-control" type="text" name="no_sigla" value="{{$unidade->no_sigla}}" maxlength="45">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Endereço:</span>
							<input class="form-control" type="text" name="no_endereco" value="{{$unidade->no_endereco}}" required maxlength="100">
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
							<span class="input-group-addon">Cidade:</span>
							<select class="form-control" name="cidade_id" id="cidade_id">
								@foreach($cidades as $cid)
								<option value="{{$cid->id}}"
									@if($cid->id == $unidade->cidade_id)
									selected
									@endif
								>{{$cid->no_cidade}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
							<span class="input-group-addon">CEP:</span>
							<input class="form-control cep" type="text" name="nu_cep" value="{{$unidade->nu_cep}}" maxlength="45">
						</div>
					</div>
				</div>
				<label for="status">Status</label>
				<label class="radio-inline"><input type="radio" name="status" value="1"
				@if($unidade->status == 1)
				checked
				@endif
				> Ativo</label>
				<label class="radio-inline"><input type="radio" name="status" value="0"
				@if($unidade->status == 0)
				checked
				@endif
				> Inativo</label>
				<div class="text-right">
					<a href="javascript:history.back();" class="btn btn-warning btn-sm">Cancelar</a>
					<button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Alterar</button>
				</div>
			</form>

		</div>
	</div>
	<!-- fim form -->

</div>
<!-- fim container -->
@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}}></script>
<script type="text/javascript">
	$(document).ready(function($){
		$('.cep').mask('00000-000');
	});
</script>