@extends('menu')
@section('title', 'Frameworks')

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Frameworks</h4></div>
			<div class="panel-body text-right">
				<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="cadastrar framework"
			  	data-toggle="modal" data-target="#modal_cad">Novo Framework</button>
			</div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- modal cad -->

	<div id="modal_cad" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Cadastro de Framework</h4>
	      </div>
	      <div class="modal-body">
					<form class="form_framework" id="form_framework" action={{route('framework.inserir')}} method="post">
						{{csrf_field()}}
						<div class="input-group">
							<span class="input-group-addon">Nome:</span>
							<input class="form-control"type="text" name="no_framework" id="no_framework" placeholder="nome do framework" required maxlength="200">
						</div>
					</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-success btn-sm" form="form_framework" id="btn_salvar">Salvar</button>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- fim modal cad -->

	<!-- alerts -->
	@if(Session::has('retorno'))
	<div class="alert alert-{{Session::get('retorno')['tipo']}} alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<li>{{Session::get('retorno')['msg']}}</li>
	</div>
	@endif
	<!-- fim alerts -->

	<!-- tabela -->
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">

				<thead>
					<tr>
						<td>Nome Framework:</td>
						<td>Editar</td>
						<td>Excluir</td>
					</tr>
				</thead>

				<tbody>

					@foreach($listaFrameworks as $frameworks)

					<tr>
						<td>{{$frameworks->no_framework}}</td>
						<td align="center">
							<a href= {{route('framework.altera', $frameworks->id)}} class="btn btn-warning btn-sm" title="editar">
	  							<i class="glyphicon glyphicon-edit"></i>
	  						</a>
						</td>
						<td align="center">
							<a href="#" class="btn btn-danger btn-sm" title="excluir" disabled
	  						onclick="confirmaDeleta('{{route('framework.apagar', $frameworks->id)}}');">
	  							<i class="glyphicon glyphicon-remove"></i>
	  						</a>
						</td>
					</tr>

					@endforeach

				</tbody>

				<tfoot>
					<tr>
						<td>Nome Framework:</td>
						<td>Editar</td>
						<td>Excluir</td>
					</tr>
				</tfoot>

			</table>
		</div>
	</div>

	<!-- fim tabela -->
</div>

@endsection
<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/framework.js')}}></script>
<!-- <script type="text/javascript">
    function confirmaDeleta(url){
        if(window.confirm('Deseja realmente apagar o registro?')){
            window.location = url;
        }
    }
</script> -->
