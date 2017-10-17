@extends('menu')
@section('title', 'Altera Desenvolvedor')

<style type="text/css">
	.input-group {
		margin-top: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Altera Desenvolvedor</h4></div>
		</div>
	</div>
	<!-- fim painel -->

	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			
			<form id="form_dev" method="POST" action={{route('desenvolvedor.atualizar', $des->id)}}>
			    {{csrf_field()}}
				<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input id="no_dev" type="text" class="form-control" name="no_dev" placeholder="nome do desenvolvedor"
				    maxlength="200" value="{{$des->no_dev}}" required>
				</div>
				<div class="input-group">
				    <span class="input-group-addon">IP:</span>
				    <input id="ip_dev" type="text" class="form-control ip" name="ip_dev" placeholder="IP do desenvolvedor"
				    maxlength="50" value="{{$des->ip_dev}}">
				</div>
				<div class="text-right" style="margin-top: 10px;">
					<a href="javascript:history.back()" class="btn btn-warning btn-sm">Cancelar</a>
					<button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Alterar</button>
				 </div>

			</form>
			
		</div>
	</div>

</div>
@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}}></script>
<script type="text/javascript">
	$(document).ready(function($){
		$('.ip').mask('099.099.099.099');
	});
</script>
