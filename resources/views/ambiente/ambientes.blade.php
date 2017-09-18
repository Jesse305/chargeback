@extends('menu')
@section('title', 'Ambientes')

<style media="screen">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')

<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Ambientes</h4></div>
			<div class="panel-body text-right">
				<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="cadastrar ambiente"
			  	data-toggle="modal" data-target="#modal_cad">Novo Ambiente</button>
			</div>
		</div>
	</div>
	<!-- fim painel -->

	<!-- alerts -->
	@if(Session::has('retorno'))
	<div class="alert alert-{{Session::get('retorno')['tipo']}} alert-dismissable">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <li>{{Session::get('retorno')['msg']}}</li>
	</div>
	@endif
	<!-- fim alerts -->

  <!-- modal -->
  <div id="modal_cad" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastro de Ambiente</h4>
        </div>
        <div class="modal-body">
			<form action={{route('ambiente.inserir')}} method="post" id="form_amb">
				{{csrf_field()}}
				<input type="hidden" name="_insert" value="insert">
				<div class="input-group">
					<span class="input-group-addon">Descrição:</span>
					<input id="desc_amb" type="text" class="form-control" name="desc_amb" placeholder="Ex.: nome do sistema"
					required maxlength="200">
				</div>

				<label for="">Ambiente Treinamento</label>

				<div class="input-group">
					<span class="input-group-addon">IP:</span>
					<input id="ip_trein" type="text" class="form-control" name="ip_trein" placeholder="IP do ambiente de treinamento"
				  maxlength="45">
				</div>

				<div class="input-group">
					<span class="input-group-addon">Usuário:</span>
					<input id="usuario_trein" type="text" class="form-control" name="usuario_trein" placeholder="usuário ambiente de treinamento"
				  maxlength="100">
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Senha:</span>
				    <input id="senha_trein" type="password" class="form-control senha" name="senha_trein" placeholder="senha para ambiente de treinamento" maxlength="100">
				</div>

				<label for="">Ambiente Homologação</label>

				<div class="input-group">
					<span class="input-group-addon">IP:</span>
					<input id="ip_homol" type="text" class="form-control" name="ip_homol" placeholder="IP do ambiente de homologação"
					maxlength="45" required>
				</div>

				<div class="input-group">
					<span class="input-group-addon">Usuário:</span>
					<input id="usuario_homol" type="text" class="form-control" name="usuario_homol" placeholder="usuário ambiente de homologação"
				  maxlength="100" required>
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Senha:</span>
				    <input id="senha_homol" type="password" class="form-control senha" name="senha_homol" placeholder="senha para ambiente de homologação" maxlength="100"
						required>
				</div>

				<label for="">Ambiente Produção</label>

				<div class="input-group">
					<span class="input-group-addon">IP:</span>
					<input id="ip_prod" type="text" class="form-control" name="ip_prod" placeholder="IP do ambiente de produção"
					maxlength="45" required>
				</div>

				<div class="input-group">
					<span class="input-group-addon">Usuário:</span>
					<input id="usuario_prod" type="text" class="form-control" name="usuario_prod" placeholder="usuário ambiente de produção"
				  maxlength="100" required>
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Senha:</span>
				    <input id="senha_prod" type="password" class="form-control senha" name="senha_prod" placeholder="senha para ambiente de produção" maxlength="100"
						required>
				</div>

				<div class="input-group">
				    <span class="input-group-addon">Link:</span>
				    <input id="link_prod" type="text" class="form-control" name="link_prod" placeholder="link ambiente de produção" maxlength="200"
						required>
				</div>

				<div class="text-right">
					<a href="#" id="revela_senha" title="revela senhas" class="btn btn-sm"><i class="glyphicon glyphicon-eye-open"></i> mostrar senhas</a>
				</div>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success btn-sm" form="form_amb" id="btn_salvar" >Salvar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- fim modal -->

  <!-- tabela -->
  <div class="row">
    <div class="col-xs-12">
      <table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px;">
        <thead>
          <tr>
            <td>Ambiente:</td>
            <td>link:</td>
            <td>Detalhes</td>
            <td>Alterar</td>
            <td>Excluir</td>
          </tr>
        </thead>

        <tbody>
          @foreach($listaAmbientes as $ambientes)
          <tr>
            <td>{{$ambientes->desc_amb}}</td>
            <td><a href="{{$ambientes->link_prod}}">{{$ambientes->link_prod}}</a></td>
            <td align="center">
              <a href={{route('ambiente.detalhar', $ambientes->id)}} class="btn btn-info btn-sm">
                <i class="glyphicon glyphicon-eye-open"></i>
              </a>
            </td>
            <td align="center">
              <a href={{route('ambiente.altera', $ambientes->id)}} class="btn btn-warning btn-sm">
                <i class="glyphicon glyphicon-edit"></i>
              </a>
            </td>
            <td align="center">
              <a href="#" class="btn btn-danger btn-sm" title="cuidado! apaga definitivamente o registro."
              onclick="confirmaDeleta('{{route('ambiente.apagar', $ambientes->id)}}')">
                <i class="glyphicon glyphicon-remove"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>

        <tfoot>
          <td>Ambiente:</td>
          <td>link:</td>
          <td>Alterar</td>
          <td>Detalhes</td>
          <td>Excluir</td>
        </tfoot>
      </table>
    </div>
  </div>
  <!-- fim tabela -->

</div>
<!-- fim container -->

@endsection
<script type="text/javascript" src={{asset('js/jquery.js')}}></script>
<script type="text/javascript" src={{asset('js/ambiente.js')}}></script>

<script type="text/javascript">
	function confirmaDeleta(url){
		if(window.confirm('Deseja realmente apagar o registro?')){
			window.location = url;
		}
	}
</script>
