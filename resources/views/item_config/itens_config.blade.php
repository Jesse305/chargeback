@extends('menu')
@section('title', 'Itens de Configuração')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Itens de Configuração</h4></div>
			<div class="panel-body text-right">
				<button class="btn btn-success btn-sm" id="btn_cad" data-toggle="modal" data-target="#modal_cad">Novo Item</button>
			</div>
		</div>		
	</div>
	<!-- fim painel -->

	<!-- modal -->
	<div id="modal_cad" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Cadastro de Item de Configuração</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="alert_modal"></div>
	      	<form id="form_item" method="post" action={{route('item_config.inserir')}}>
	      		{{csrf_field()}}
	      		<div class="input-group">
	      			<span class="input-group-addon">Nome:</span>
	      			<input class="form-control" type="text" name="no_item" id="no_item" maxlength="150" required>
	      		</div>
	      		<div class="form-group">
	      			<label for="ds_descricao">Descrição:</label>
	      			<textarea class="form-control" rows="4" id="ds_descricao" name="ds_descricao"></textarea>
	      		</div>
	      		<div class="input-group">
	      			<span class="input-group-addon">Categoria:</span>
	      			<select class="form-control" id="categoriaitem_id" name="categoriaitem_id">
	      				<option value="">--Selecione--</option>
	      				@foreach($categoriasItens as $itens)
	      				<option value="{{$itens->id}}">{{$itens->no_categoriaitem}}</option>
	      				@endforeach
	      			</select>
	      		</div>
	      		<div class="input-group">
	      			<span class="input-group-addon">Configuração:</span>
	      			<input class="form-control" type="text" name="ds_configuracao" id="ds_configuracao" maxlength="100" required>
	      		</div>
	      		<div class="input-group">
	      			<span class="input-group-addon">Custo Mensal:</span>
	      			<input class="form-control" type="text" name="nu_custo_mensal" id="nu_custo_mensal" maxlength="13" required>
	      		</div>
	      		<label for="">Status</label>
	      		<label class="radio-inline"><input type="radio" name="status" value="1" checked>Ativo</label>    		
	      		<label class="radio-inline"><input type="radio" name="status" value="0" >Inativo</label> 
	      		<input type="hidden" name="dt_cadastro" value="{{date('Y-m-d H:i:s')}}">   		
	      	</form>	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
	        <button type="submit" form="form_item" class="btn btn-success btn-sm" id="btn_salvar">Salvar</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- fim modal -->

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
						<td>Item:</td>
						<td>Categoria:</td>
						<td>Custo:</td>
						<td align="center" width="100">Ações</td>
					</tr>
				</thead>
				<tbody>
					@foreach($listaItens as $itens)
					<tr>
						<td>{{$itens->no_item}}</td>
						<td>
							@foreach($categoriasItens as $cat)
								@if($cat->id == $itens->categoriaitem_id)
								{{$cat->no_categoriaitem}}
								@endif
							@endforeach
						</td>
						<td>{{$itens->nu_custo_mensal}}</td>
						<td align="center">
							<a href={{route('item_config.detalhar', $itens->id)}} class="btn btn-info btn-sm" title="visualizar">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>&nbsp;
							<a href={{route('item_config.altera', $itens->id)}} class="btn btn-warning btn-sm" title="editar">
								<i class="glyphicon glyphicon-edit"></i>
							</a>&nbsp;
							<button class="btn btn-danger btn-sm" onclick="confirmaDeleta('{{route('item_config.apagar', $itens->id)}}');" title="cuidado! apaga definitivamente o registro" disabled>
								<i class="glyphicon glyphicon-remove"></i>
							</button>
						</td>
					</tr>
					@endforeach				
				</tbody>
				<tfoot>
					<tr>
						<td>Item:</td>
						<td>Categoria:</td>
						<td>Custo:</td>
						<td align="center">Ações</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<!-- fim tabela -->

</div>
@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/item_config.js')}}></script>