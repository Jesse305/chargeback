@extends('menu')

@section('title', 'Sistemas')

<style type="text/css">
	.input-group{
		margin-bottom: 5px;
	}
</style>

@section('content')
    <div class="container">
    	<!-- painel -->
    	<div class="row">
    		<div class="col-xs-12">
	    		<div class="panel panel-default">
				  <div class="panel-heading"><h4>Sistemas</h4></div>
				  <div class="panel-body text-right">
				  	<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="Cadastrar novo sistema"
				  	data-toggle="modal" data-target="#modal_cad">Novo Sistema</button>
				  </div>
				</div>
    		</div>
    		<!-- /painel -->
    	</div>
    	<!-- /primeira row -->

	    <!-- alerts -->
		@if(session('retorno'))
		<div class="alert alert-{{session('retorno')['tipo']}}">
			<button type="button" class="close" data-dismiss="alert" id="fecha_alerta">&times;</button>
			<li>{{session('retorno')['msg']}}</li>
		</div>
		@endif
		<!-- fim alerts -->

    	<!-- Modal -->
		<div id="modal_cad" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Cadastro de Sistemas</h4>

		      </div>
		      <div class="modal-body">
		      	<div class="alerta_cad" id="alerta_cad"></div>
		      	<form class="form_cad" id="form_cad" method="POST" action={{route('sistema.inserir')}}>
		      		@include('sistema.form')
		      	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="reset" class="btn btn-warning btn-sm" form="form_cad" id="btn_cancelar">Cancelar</button>
		        <button type="submit" class="btn btn-success btn-sm btn_salvar" form="form_cad" id="btn_salvar">Salvar</button>
		      </div>
		    </div>

		  </div>
		</div>
		<!-- /modal -->

		<!-- tabela -->

		<div class="row">
			<div class="col-xs-12">

				<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">
					<thead>
						<tr>
							<td>Sigla:</td>
							<td>Nome:</td>
							<td>Status:</td>
							<td align="center">Ações</td>
						</tr>
					</thead>

					<tbody>

						@foreach($listaSistemas as $sistemas)
						<tr>
							<td>{{$sistemas->no_sigla}}</td>
							<td>{{$sistemas->no_sistema}}</td>
							<td>{{$sistemas->status}}</td>
							<td align="center">

								<a href={{route('sistema.detalhar', $sistemas->id)}} class="btn btn-info btn-sm" title="visualizar"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;

								<a href={{route('sistema.altera', $sistemas->id)}} class="btn btn-warning btn-sm" title="editar"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
								
								<button class="btn btn-danger btn-sm" title="cuidado! apaga permanentemente o registro."
								onclick="confirmaDeleta('{{route('sistema.apagar', $sistemas->id)}}');"><i class="glyphicon glyphicon-remove"></i></button>
								
							</td>
						</tr>
						@endforeach
						
					</tbody>

					<tfoot>
						<tr>
							<td>Sigla:</td>
							<td>Nome:</td>
							<td>Status:</td>
							<td align="center">Ações</td>
						</tr>						
					</tfoot>
				</table>				
			</div>
		</div>

		<!-- fim tabela -->

    </div>
    <!-- /primeiro container -->

@endsection

    <script type="text/javascript" src={{ asset('js/jquery.js') }}></script>
    <script type="text/javascript" src={{ asset('js/sistema.js') }}></script>