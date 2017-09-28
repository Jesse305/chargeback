$(document).ready(function(){

	//funções de alerta
	function limpaAlerta(div_alerta){
		div_alerta.empty();
	}	

	function criaAlerta(div_alerta, tipo_alerta, msg){
		limpaAlerta(div_alerta);
		div_alerta.html(
			'<div class="alert alert-'+tipo_alerta+' alert-dismissable">'+
			  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
			  '<b>-</b> '+msg+
			'</div>'
		);
	}

	//validação
	function valida(){
		var retorno = false;
		var alerta = $('#alerta');
		var tipoAlerta = 'warning';
		if(document.getElementById('categoriaitem_id').selectedIndex == 0){
			criaAlerta(alerta, tipoAlerta, 'Selecione a Categoria do Item de Configuração.');
			$('#categoriaitem_id').focus();
		}
		else{
			retorno = true;
		}

		return retorno;
	}

	//submit do formulario
	$('#form_altera').on('submit', function(){
		if(valida()){
			$('#btn_alterar').attr('disabled', true);
			limpaAlerta($('#alerta'));
			return true;
		}else{
			return false;
		}
	});

});