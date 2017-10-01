@extends('menu')
@section('title', 'Ambiente')

@section('content')

<div class="container">
  <div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Ambiente</h4></div>
		</div>
  </div>
  <!-- fim painel -->

  <!-- tabela -->

  <table class="table table-striped table-bordered table-hover" id="tab_detalhes" style="font-size: 12px;">
      <tr>
        <td class="col-xs-4"><b>Descrição:</b></td>
        <td class="col-xs-8">{{$ambiente->desc_amb}}</td>
      </tr>
      <tr>
        <td colspan="2"><h5>Ambiente Treinamento</h5s></td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>IP:</b></td>
        <td class="col-xs-8">{{$ambiente->ip_trein}}</td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>Usuário:</b></td>
        <td class="col-xs-8">{{$ambiente->usuario_trein}}</td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>Senha:</b></td>
        <td class="col-xs-8">
                    <div class="input-group">
            <input type="password" class="form-control senha" value="{{$ambiente->senha_trein}}" readonly>
            <span class="input-group-addon">
                <button  class="btn btn-xs revela_senha" onclick="return false;" title="mostrar senhas">
                  <i class="glyphicon glyphicon-eye-open"></i>
                </button> 
            </span>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2"><h5>Ambiente Homologação</h5></td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>IP:</b></td>
        <td class="col-xs-8">{{$ambiente->ip_homol}}</td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>Usuário:</b></td>
        <td class="col-xs-8">{{$ambiente->usuario_homol}}</td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>Senha:</b></td>
        <td class="col-xs-8">
          <div class="input-group">
            <input type="password" class="form-control senha" value="{{$ambiente->senha_homol}}" readonly>
            <span class="input-group-addon">
                <button  class="btn btn-xs revela_senha" onclick="return false;" title="mostrar senhas">
                  <i class="glyphicon glyphicon-eye-open"></i>
                </button> 
            </span>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2"><h5>Ambiente Produção</h5></td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>IP:</b></td>
        <td class="col-xs-8">{{$ambiente->ip_prod}}</td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>Usuário:</b></td>
        <td class="col-xs-8">{{$ambiente->usuario_prod}}</td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>Senha:</b></td>
        <td class="col-xs-8">
          <div class="input-group">
            <input type="password" class="form-control senha" value="{{$ambiente->senha_prod}}" readonly>
            <span class="input-group-addon">
                <button  class="btn btn-xs revela_senha" onclick="return false;" title="mostrar senhas">
                  <i class="glyphicon glyphicon-eye-open"></i>
                </button> 
            </span>
          </div>          
        </td>
      </tr>
      <tr>
        <td class="col-xs-4"><b>Link:</b></td>
        <td class="col-xs-8">
          <a href="{{$ambiente->link_prod}}">{{$ambiente->link_prod}}</a>
        </td>
      </tr>

  </table>
  <div class="text-right">
    <a href="javascript:history.back()" class="btn btn-success btn-md" title="voltar">
      <span class="glyphicon glyphicon-arrow-left"></span>
    </a>
  </div>

  <!-- fim tabela -->

</div>
<!-- fim container -->

@endsection

<script type="text/javascript" src= {{asset('js/jquery.js')}}></script>
<script type="text/javascript" src= {{asset('js/ambiente.js')}}></script>
