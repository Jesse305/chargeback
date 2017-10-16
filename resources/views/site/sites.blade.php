@extends('menu')
@section('title', 'Sites')

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
			  <div class="panel-heading"><h4>Sites</h4></div>
			  <div class="panel-body text-right">
			  	<button class="btn btn-success btn-sm btn_cad" id="btn_cad" title="Cadastrar novo sistema"
			  	data-toggle="modal" data-target="#modal_cad">Novo Site</button>
			  </div>
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
        <h4 class="modal-title">Cadastro de Site</h4>
      </div>
      <div class="modal-body">
        <div id="alert_modal"></div>
      	<form id="form_cad" method="POST" action={{route('site.inserir')}} >
      		{{csrf_field()}}
      		<div class="input-group">
      			<span class="input-group-addon">Orgão:</span>
      			<select class="form-control" name="orgao_id" id="orgao_id">
      				<option value="">--Selecione--</option>
      				@foreach($listaOrgaos as $orgaos)
      				<option value="{{$orgaos->id}}">{{$orgaos->no_sigla}} - {{$orgaos->no_orgao}}</option>
      				@endforeach
      			</select>
      		</div>
          <div class="input-group">
            <span class="input-group-addon">Unidade:</span>
            <select class="form-control" id="unidade_id" name="unidade_id">
                <option value="">--Selecione--</option>
            </select>
          </div>
          <div class="input-group">
            <span class="input-group-addon">Nome:</span>
            <input class="form-control" type="text" name="no_site" id="no_site" maxlength="100"
            value="{{old('no_site')}}" >
          </div>
          <div class="input-group">
            <span class="input-group-addon">Endereço do Site:</span>
            <input class="form-control" type="text" name="ds_website" id="ds_website" maxlength="45"
            value="{{old('ds_website')}}">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Caminho do Servidor:</span>
            <input class="form-control ip" type="text" name="ip_html" id="ip_html" maxlength="50"
            value="{{old('ip_html')}}">
          </div>
          <label for="tp_portal">Tipo de Site:</label>
          <label class="radio-inline"> <input type="radio" name="tp_portal" id="tp_portal" value="RA" checked> Região Admistrativa </label>
          <label class="radio-inline"> <input type="radio" name="tp_portal" id="tp_hotsite" value="Secretaria"
          @if(old('tp_portal') == 'Secretaria') checked @endif > Secretaria </label>
          <label class="radio-inline"> <input type="radio" name="tp_portal" id="tp_outros" value="Outros"
          @if(old('tp_portal') == 'Outros') checked @endif > Outros </label>
          <div class="input-group">
            <span class="input-group-addon">End. do Publicador:</span>
            <input class="form-control" type="text" name="no_dns" id="no_dns" maxlength="100" value="{{old('no_dns')}}">
          </div>
          <label for="">Necessita Token de Acesso?</label>
          <label class="radio-inline"><input type="radio" name="st_token" id="token_sim" value="SIM" checked="checked">SIM</label>
          <label class="radio-inline"><input type="radio" name="st_token" id="token_nao" value="NÃO"
          @if(old('st_token') == 'NÃO') checked @endif >NÃO</label>

          <h5><b>Dados Google Analytics</b></h5>
          <div class="input-group">
            <span class="input-group-addon">Conta:</span>
            <input class="form-control" type="text" name="usuario_analytics" id="usuario_analytics" maxlength="100" 
            value="{{old('usuario_analytics')}}">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Senha:</span>
            <input class="form-control senha" type="password" name="senha_analytics" id="senha_analytics" maxlength="100">
            <span class="input-group-addon">
              <button class="btn btn-xs revela_senha" onclick="return false;">
                <i class="glyphicon glyphicon-eye-open"></i>
              </button>
            </span>
          </div>
          <div class="input-group">
            <span class="input-group-addon">Código:</span>
            <input class="form-control" type="text" name="codigo_analytics" id="codigo_analytics" maxlength="45"
            value="{{old('codigo_analytics')}}">
          </div>
          <h5><b>Dados Banco de Dados</b></h5>
          <div class="input-group">
            <span class="input-group-addon">IP:</span>
            <input class="form-control ip" type="text" name="ip_banco" id="ip_banco" maxlength="15"
            value="{{old('ip_banco')}}">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Usuário:</span>
            <input class="form-control" type="text" name="usuario_banco" id="usuario_banco" maxlength="45"
            value="{{old('usuario_banco')}}">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Senha:</span>
            <input class="form-control senha" type="password" name="pwd_banco" id="pwd_banco" maxlength="45">
            <span class="input-group-addon">
              <button class="btn btn-xs revela_senha" onclick="return false;">
                <i class="glyphicon glyphicon-eye-open"></i>
              </button>
            </span>
          </div>
          <div class="input-group">
            <span class="input-group-addon">Schema:</span>
            <input class="form-control" type="text" name="esquema_banco" id="esquema_banco" maxlength="45"
            value="{{old('esquema_banco')}}">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Prefixo Tabela:</span>
            <input class="form-control" type="text" name="prefixo_tabela" id="prefixo_tabela" maxlength="45"
            value="{{old('prefixo_tabela')}}">
          </div>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="form_cad" class="btn btn-success btn-sm" id="btn_salvar">Salvar</button>
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
		<table class="table table-striped table-bordered table-hover" id="tab_resumo" style="font-size: 12px">
			<thead>
				<tr>
					<td>Nome:</td>
					<td>Publicador:</td>
					<td>Site:</td>
					<td align="center" width="100">Ações</td>
				</tr>
			</thead>
			<tbody>
				@foreach($listaSites as $sites)
				<tr>
					<td>{{$sites->no_site}}</td>
					<td><a href="http://{{$sites->no_dns}}">{{$sites->no_dns}}</a></td>
					<td><a href="http://{{$sites->ds_website}}">{{$sites->ds_website}}</a></td>
					<td align="center">
						<a href={{route('site.detalhar', $sites->id)}} class="btn btn-info btn-sm" title="visualizar"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;
						<a href={{route('site.altera', $sites->id)}} class="btn btn-warning btn-sm" title="editar"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
						<button class="btn btn-danger btn-sm" onclick="confirmaDeleta('{{route('site.apagar', $sites->id)}}');" title="cuidado! apaga o registro definitivamente." disabled>
							<i class="glyphicon glyphicon-remove"></i>
						</button>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td>Nome:</td>
					<td>Publicador:</td>
					<td>Site:</td>
					<td align="center">Ações</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<!-- fim tabela -->

</div>
<!-- fim container -->

@endsection

<script type="text/javascript" src={{asset('js/jquery.js')}} ></script>
<script type="text/javascript" src={{asset('js/site.js')}} ></script>
<script type="text/javascript" src={{asset('js/jquery.mask.min.js')}} ></script>
<script type="text/javascript">
  $(document).ready(function($){
    $('.ip').mask('099.099.099.099');
  });
</script>

