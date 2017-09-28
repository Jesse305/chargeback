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
			@foreach($dev as $d)
			<form id="form_dev" method="POST" action={{route('desenvolvedor.atualizar', $d->id)}}>
				  {{csrf_field()}}
				  <input type="hidden" name="_update" value="update">
				  <div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input id="no_dev" type="text" class="form-control" name="no_dev" placeholder="nome do desenvolvedor"
				     required maxlength="200" value="{{$d->no_dev}}"
				    >
				  </div>

				  <div class="input-group">
				    <span class="input-group-addon">IP:</span>
				    <input id="ip_dev" type="text" class="form-control" name="ip_dev" placeholder="IP do desenvolvedor"
				    required maxlength="50"
				    @if(!$d->ip_dev == '')
				    	value="{{$d->ip_dev}}"
				    @else
				    	value="ip não cadastrado"
				    @endif
				    >
				  </div>

				  <div class="text-right" style="margin-top: 10px;">
					<a href="javascript:history.back()" class="btn btn-warning btn-sm">Cancelar</a>
					<button type="submit" class="btn btn-success btn-sm" id="btn_salvar">Alterar</button>
				  </div>

			</form>
			@endforeach
		</div>
	</div>

</div>

@endsection
