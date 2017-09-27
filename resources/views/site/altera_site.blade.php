@extends('menu')
@section('title', 'Altera Site')

<style type="text/css">
	.input-group {
		margin-bottom: 5px;
	}
</style>

@section('content')
<div class="container" style="margin-top: 60px; margin-bottom: 60px">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Altera Site</h4></div>
		</div>
	</div>
	<!-- fim painel	 -->

	<!-- alerta -->
	<div id="alerta"></div>
	<!-- fim alerta -->

	<!-- form -->
	<div class="row">
		<div class="col-xs-12">
			<form id="form_cad" method="post" action={{route('site.atualizar', $site[0]->id)}}>
				{{csrf_field()}}
				<div class="row">
					<div class="col-xs-12">
						<b>Dados do Site</b>
					</div>
				</div>
				<!-- fim row 1 -->
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
			      			<span class="input-group-addon">Orgão:</span>
			      			<select class="form-control" name="orgao_id" id="orgao_id">
			      				<option value="">--Selecione--</option>
			      				@foreach($listaOrgaos as $orgaos)
			      				<option value="{{$orgaos->id}}"
			      				@if($orgaos->id == $site[0]->orgao_id)
			      				selected
			      				@endif
			      				>{{$orgaos->no_sigla}} - {{$orgaos->no_orgao}}</option>
			      				@endforeach
			      			</select>
			      		</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				            <span class="input-group-addon">Unidade:</span>
				            <select class="form-control" id="unidade_id" name="unidade_id" disabled>
				            	<option value="">--Selecione--</option>
				            	@if(sizeof($unidade) > 0)
				                <option value="{{$unidade[0]->id}}" selected>{{$unidade[0]->no_unidade}}</option>
				                @else
				                <option value="0" selected="">Selecione o Órgão.</option>
				                @endif
				            </select>
				        </div>
					</div>
				</div>
				<!-- fim row 2 -->

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				           <span class="input-group-addon">Nome:</span>
				           <input class="form-control" type="text" name="no_site" id="no_site" maxlength="100"
				           value="{{$site[0]->no_site}}" required>
				         </div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				           <span class="input-group-addon">Endereço do Site:</span>
				           <input class="form-control" type="text" name="ds_website" id="ds_website" maxlength="45"
				           value="{{$site[0]->ds_website}}" required>
				        </div>
					</div>
				</div>
				<!-- fim row 3 -->

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				           <span class="input-group-addon">Caminho do Servidor:</span>
				           <input class="form-control" type="text" name="ip_html" id="ip_html" maxlength="50"
				           value="{{$site[0]->ip_html}}" required>
				         </div>
					</div>
					<div class="col-xs-12 col-md-6">
						  <label for="tp_portal">Tipo de Site:</label>
				          <label class="radio-inline"> <input type="radio" name="tp_portal" id="tp_portal" value="RA"
				          @if($site[0]->tp_portal == 'RA') checked @endif
				          > Região Admistrativa </label>
				          <label class="radio-inline"> <input type="radio" name="tp_portal" id="tp_hotsite" value="Secretaria"
				          @if($site[0]->tp_portal == 'Secretaria') checked @endif
				          > Secretaria </label>
				          <label class="radio-inline"> <input type="radio" name="tp_portal" id="tp_outros" value="Outros"
				          @if($site[0]->tp_portal == 'Outros') checked @endif
				          > Outros </label>
					</div>
				</div>
				<!-- fim row 4 -->

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				           <span class="input-group-addon">End. do Publicador:</span>
				           <input class="form-control" type="text" name="no_dns" id="no_dns" maxlength="100"
				           value="{{$site[0]->no_dns}}"  required 
				           >
				        </div>						
					</div>
					<div class="col-xs-12 col-md-6">
						  <label for="">Necessita Token de Acesso?</label>
				          <label class="radio-inline"><input type="radio" name="st_token" id="token_sim" value="SIM"
				          @if($site[0]->st_token == 'SIM') checked @endif
				          >SIM</label>
				          <label class="radio-inline"><input type="radio" name="st_token" id="token_nao" value="NÃO"
				          @if($site[0]->st_token == 'NÃO') checked @endif
				          >NÃO</label>
					</div>
				</div>
				<!-- fim row 5 -->
				<div class="row">
					<div class="col-xs-12">
						<b>Dados do Google Analytics</b>
					</div>
				</div>
				<!-- fim row 6 -->				

				<div class="row">
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
				            <span class="input-group-addon">Conta:</span>
				            <input class="form-control" type="text" name="usuario_analytics" id="usuario_analytics" maxlength="100" value="{{$site[0]->usuario_analytics}}" required>
				        </div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
				            <span class="input-group-addon">Senha:</span>
				            <input class="form-control senha" type="password" name="senha_analytics" id="senha_analytics" maxlength="100" value="{{$site[0]->senha_analytics}}" required>
				            <span class="input-group-addon">
				              <button class="btn btn-xs revela_senha" onclick="return false;">
				                <i class="glyphicon glyphicon-eye-open"></i>
				              </button>
				            </span>
				        </div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group">
				            <span class="input-group-addon">Código:</span>
				            <input class="form-control" type="text" name="codigo_analytics" id="codigo_analytics" maxlength="45" value="{{$site[0]->codigo_analytics}}" required>
				        </div>
					</div>
				</div>
				<!-- fim row 7 -->

				<div class="row">
					<div class="col-xs-12">
						<b>Dados do Banco</b>
					</div>
				</div>
				<!-- fim row 8 -->

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				            <span class="input-group-addon">IP:</span>
				            <input class="form-control" type="text" name="ip_banco" id="ip_banco" maxlength="15"
				            value="{{$site[0]->ip_banco}}" required>
				        </div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				            <span class="input-group-addon">Schema:</span>
				            <input class="form-control" type="text" name="esquema_banco" id="esquema_banco" maxlength="45"
				            value="{{$site[0]->esquema_banco}}" required>
				        </div>
					</div>
				</div>
				<!-- fim row 9 -->

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				            <span class="input-group-addon">Usuário:</span>
				            <input class="form-control" type="text" name="usuario_banco" id="usuario_banco" maxlength="45"
				            value="{{$site[0]->usuario_banco}}" required>
				        </div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				            <span class="input-group-addon">Senha:</span>
				            <input class="form-control senha" type="password" name="pwd_banco" id="pwd_banco" maxlength="45"
				            value="{{$site[0]->pwd_banco}}" required>
				            <span class="input-group-addon">
				              <button class="btn btn-xs revela_senha" onclick="return false;">
				                <i class="glyphicon glyphicon-eye-open"></i>
				              </button>
				            </span>
				        </div>
					</div>
				</div>
				<!-- fim row 10 -->
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="input-group">
				            <span class="input-group-addon">Prefixo Tabela:</span>
				            <input class="form-control" type="text" name="prefixo_tabela" id="prefixo_tabela" maxlength="45"
				            value="{{$site[0]->prefixo_tabela}}" required>
				        </div>
					</div>
				</div>
				<input type="hidden" name="dt_atualizacao" value="{{date('Y-m-d H:i:s')}}">

				<div class="text-right" style="margin-top: 20px;">
					<a href="javascript:history.back();" class="btn btn-warning btn-sm">Cancelar</a>
					<button type="submit" class="btn btn-success btn-sm" id="btn-alterar">Alterar</button>
				</div>
			</form>
		</div>
	</div>
	<!-- fim form -->
</div>
@endsection

<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/altera_site.js')}}"></script>