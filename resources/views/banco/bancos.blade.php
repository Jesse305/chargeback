@extends('menu')
@section('title', 'Banco')

@section('content')

<div class="container" style="margin-top: 60px;">
	<!-- div painel -->
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Bancos</h4></div>
			  <div class="panel-body text-right">
			  	<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="novo banco de dados"
			  	data-toggle="modal" data-target="#modal_cad">Novo Banco Dados</button>
			  </div>
			</div>
		</div>
	</div>
	<!-- fim div painel -->
	<!-- div table -->
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">

				<thead>
	  				<tr>
	  					<th>Schema:</th>
	  					<th>IP:</th>
	  					<th>Ambiente</th>
	  					<th>Visualizar</th>
	  					<th>Editar</th>
	  					<th>Excluir</th>
	  				</tr>		  				
	  			</thead>

	  			<tbody>
	  				@foreach($listaBanco as $bancos)

	  				<tr>
	  					<td>{{ $bancos->schema_banco }}</td>
	  					<td>{{ $bancos->ip_banco }}</td>
	  					<td>{{ $bancos->ambiente_banco }}</td>
	  					<td align="center">
	  						<a href="#" class="btn btn-info btn-sm" title="visualizar">
	  							<i class="glyphicon glyphicon-eye-open"></i>
	  						</a>
	  					</td>
	  					<td align="center">
	  						<a href="#" class="btn btn-warning btn-sm" title="editar">
	  							<i class="glyphicon glyphicon-edit"></i>
	  						</a>
	  					</td>
	  					<td align="center">
	  						<a href="#" class="btn btn-danger btn-sm" title="excluir"
	  						onclick="confirmaDeleta('#');">
	  							<i class="glyphicon glyphicon-remove"></i>
	  						</a>
	  					</td>
	  				</tr>

	  				@endforeach
	  			</tbody>

	  			<tfoot>
	  				<tr>
	  					<th>Schema:</th>
	  					<th>IP:</th>
	  					<th>Ambiente</th>
	  					<th>Visualizar</th>
	  					<th>Editar</th>
	  					<th>Excluir</th>
	  				</tr>		  				
	  			</tfoot>
				
			</table>
		</div>
	</div>
	<!-- fim div table -->
</div>
<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/banco.js')}}></script>
<script type="text/javascript">
            function confirmaDeleta(url){
                if(window.confirm('Deseja realmente apagar o registro?')){
                    window.location = url;
                }
            }
    </script>

@endsection