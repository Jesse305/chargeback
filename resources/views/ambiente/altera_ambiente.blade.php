@extends('menu')
@section('title', 'Altera Ambiente')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-body"><h4>Alterar Ambiente</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- form -->

	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action={{route('ambiente.atualizar', $ambiente->id)}} method="post" id="form_amb">
				{{csrf_field()}}
				<div class="input-group">
					<span class="input-group-addon">Descrição:</span>
					<input id="desc_amb" type="text" class="form-control" name="desc_amb" placeholder="Ex.: nome do sistema"
					required maxlength="200" value="{{$ambiente->desc_amb}}">
				</div>

				<label for="">Ambiente Treinamento</label>

				<div class="input-group">
					<span class="input-group-addon">IP:</span>
					<input id="ip_trein" type="text" class="form-control ip" name="ip_trein" placeholder="IP do ambiente de treinamento" maxlength="45" value="{{$ambiente->ip_trein}}">
				</div>

				<div class="input-group">
					<span class="input-group-addon">Usuário:</span>
					<input id="usuario_trein" type="text" class="form-control" name="usuario_trein" placeholder="usuário ambiente de treinamento" maxlength="100" value="{{$ambiente->usuario_trein}}">
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Senha:</span>
				    <input id="senha_trein" type="password" class="form-control senha" name="senha_trein" placeholder="senha para ambiente de treinamento" maxlength="100" value="{{$ambiente->senha_trein}}">
				    <span class="input-group-addon">
				    	<button onclick="return false;" title="revela senhas" class="btn btn-xs revela_senha"><i class="glyphicon glyphicon-eye-open"></i></button>
				    </span>
				</div>

				<label for="">Ambiente Homologação</label>

				<div class="input-group">
					<span class="input-group-addon">IP:</span>
					<input id="ip_homol" type="text" class="form-control ip" name="ip_homol" placeholder="IP do ambiente de homologação" maxlength="45" required value="{{$ambiente->ip_homol}}">
				</div>

				<div class="input-group">
					<span class="input-group-addon">Usuário:</span>
					<input id="usuario_homol" type="text" class="form-control" name="usuario_homol" placeholder="usuário ambiente de homologação" maxlength="100" required value="{{$ambiente->usuario_homol}}">
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Senha:</span>
				    <input id="senha_homol" type="password" class="form-control senha" name="senha_homol" placeholder="senha para ambiente de homologação" maxlength="100" required value="{{$ambiente->senha_homol}}">
				    <span class="input-group-addon">
				    	<button onclick="return false;" title="revela senhas" class="btn btn-xs revela_senha"><i class="glyphicon glyphicon-eye-open"></i></button>
				    </span>
				</div>

				<label for="">Ambiente Produção</label>

				<div class="input-group">
					<span class="input-group-addon">IP:</span>
					<input id="ip_prod" type="text" class="form-control ip" name="ip_prod" placeholder="IP do ambiente de produção" maxlength="45" required value="{{$ambiente->ip_prod}}">
				</div>

				<div class="input-group">
					<span class="input-group-addon">Usuário:</span>
					<input id="usuario_prod" type="text" class="form-control" name="usuario_prod" placeholder="usuário ambiente de produção" maxlength="100" required value="{{$ambiente->usuario_prod}}">
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Senha:</span>
				    <input id="senha_prod" type="password" class="form-control senha" name="senha_prod" placeholder="senha para ambiente de produção" maxlength="100" required value="{{$ambiente->senha_prod}}">
				    <span class="input-group-addon">
				    	<button onclick="return false;" title="revela senhas" class="btn btn-xs revela_senha"><i class="glyphicon glyphicon-eye-open"></i></button>
				    </span>
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Link:</span>
				    <input id="link_prod" type="text" class="form-control" name="link_prod" placeholder="link ambiente de produção" maxlength="200"	required value="{{$ambiente->link_prod}}">
				</div>

				<div class="text-right" style="margin-top: 20px;">
					<a href="javascript: history.back();" class="btn btn-warning btn-sm">Cancelar</a>
					<button type="input" class="btn btn-success btn-sm">Alterar</button>
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
<script type="text/javascript" src={{asset('js/ambiente.js')}}></script>
<script type="text/javascript">
	$(document).ready(function($){
		$('.ip').mask('099.099.099.099');
	});
</script>