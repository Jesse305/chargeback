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

			<form id="form_unidade" method="POST" action={{route('unidade.atualizar', $unidade[0]->id)}}>
				{{csrf_field()}}
				@foreach($unidade as $unid)
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Órgão:</span>
							<input class="form-control" type="text" name="no_orgao" value="{{$orgao[0]->no_orgao}}" readonly>
						</div>
					</div>					
				</div>
				<div class="row">					
					<div class="col-xs-12 col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Nome:</span>
							<input class="form-control" type="text" name="no_unidade" value="{{$unid->no_unidade}}" maxlength="100" required>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
							<div class="input-group-addon">Sigla:</div>
							<input class="form-control" type="text" name="no_sigla" value="{{$unid->no_sigla}}" maxlength="45">
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Endereço:</span>
							<input class="form-control" type="text" name="no_endereco" value="{{$unid->no_endereco}}" required maxlength="100">
						</div>						
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
							<span class="input-group-addon">Cidade:</span>
							<select class="form-control" name="cidade_id" id="cidade_id">
								@foreach($cidades as $cid)
								<option value="{{$cid->id}}"
									@if($cid->id == $unid->cidade_id)
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
							<input class="form-control" type="text" name="nu_cep" value="{{$unid->nu_cep}}" maxlength="45">
						</div>
					</div>					
				</div>
				<label for="status">Status</label>
				<label class="radio-inline"><input type="radio" name="status" value="1"
				@if($unid->status == 1)
				checked
				@endif
				> Ativo</label>	
				<label class="radio-inline"><input type="radio" name="status" value="0"
				@if($unid->status == 0)
				checked
				@endif
				> Inativo</label>
				@endforeach
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#form_unidade').on('submit', function(){
			$('#btn_salvar').attr('disabled', true);
		});
	});
</script>