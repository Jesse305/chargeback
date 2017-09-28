@extends('menu')
@section('title', 'Desenvolvedores')

<style type="text/css">
	.input-group {
		margin-top: 5px;
	}
</style>

@section('content')

<div class="container">
	<!-- div painel -->
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Desenvolvedores</h4></div>
			  <div class="panel-body text-right">
			  	<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="Novo Desenvolvedor"
			  	data-toggle="modal" data-target="#modal_cad">Novo Desenvolvedor</button>
			  </div>
			</div>
		</div>
	</div>
	<!-- fim div painel -->

	<!-- Modal -->
	<div id="modal_cad" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Novo Desenvolvedor</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="alerta" id="alerta"></div>
	      	<form id="form_dev" method="POST" action="{{ route('desenvolvedor.inserir') }}">
	      		{{ csrf_field() }}
	      		<input type="hidden" name="_insert" value="insert">
	      		<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input id="no_dev" type="text" class="form-control" name="no_dev" placeholder="nome do desenvolvedor"
				    required maxlength="199">
				</div>
				<div class="input-group">
				    <span class="input-group-addon">IP:</span>
				    <input id="ip_dev" type="text" class="form-control" name="ip_dev" placeholder="IP do desenvolvedor"
				    required maxlength="50">
				</div>
	      	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-success btn-sm" form="form_dev" id="btn_salvar">Salvar</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- fim da modal cadastro -->

	<!-- alerts -->
	@if(Session::has('retorno'))
	<div class="alert alert-{{Session::get('retorno')['tipo']}} alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<li>{{Session::get('retorno')['msg']}}</li>
	</div>
	@endif
	<!-- fim alerts -->

	<!-- table -->

	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">

				<thead>
					<tr>
						<td><b>Nome:</b></td>
						<td><b>IP:</b></td>
						<td><b>Editar</b></td>
						<td><b>Excluir</b></td>
					</tr>
				</thead>

				<tbody>
					@foreach($listaDevs as $devs)

					<tr>
						<td>{{$devs->no_dev}}</td>
						<td>{{$devs->ip_dev}}</td>
						<td align="center">
							<a href={{route('desenvolvedor.altera', $devs->id)}} class="btn btn-warning btn-sm" title="editar">
	  							<i class="glyphicon glyphicon-edit"></i>
	  						</a>
						</td>
						<td align="center">
							<a href="#" class="btn btn-danger btn-sm" title="excluir" disabled
	  						onclick="confirmaDeleta('{{route('desenvolvedor.apagar', $devs->id)}}');">
	  							<i class="glyphicon glyphicon-remove"></i>
	  						</a>
						</td>
					</tr>

					@endforeach
				</tbody>

				<tfoot>
					<tr>
						<td><b>Nome:</b></td>
						<td><b>IP:</b></td>
						<td><b>Editar</b></td>
						<td><b>Excluir</b></td>
					</tr>
				</tfoot>

			</table>
		</div>
	</div>
	<!-- fim table -->

</div>
<!-- fim container -->


@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/desenvolvedor.js')}}></script>
<!-- <script type="text/javascript">
    function confirmaDeleta(url){
        if(window.confirm('Deseja realmente apagar o registro?')){
            window.location = url;
        }
    }
</script> -->
