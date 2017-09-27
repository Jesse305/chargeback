$(document).ready(function(){

	//carrega select unidades
	$('#orgao_id').on('change', function(){
		$('#unidade_id').attr('disabled', false);
		var id_orgao = $(this).val();
		$.ajax({
			type: 'get',
			dataType: 'json',
			data: id_orgao,
			url: '../../unidade/json/'+id_orgao,
			success: function(dados){
				var option = "<option value=''>--Selecione--</option>";
				if(dados.length > 0){
					for(var i = 0; i < dados.length; i++){
						option += "<option value='"+ dados[i].id +"'>" + dados[i].no_unidade +"</option>";
					}
				}else{
					option += "<option value='0'>Sem registros</option>";
				}
				$('#unidade_id').html(option).show();
			}
		});
	});

	// funções de alerta
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

	//funções de validação
	function valida(){
		var retorno = false;
		var alerta = $('#alerta');
		var tipo = 'warning';
		if(document.getElementById('orgao_id').selectedIndex == 0){
			criaAlerta(alerta, tipo, 'Selecione o Órgão solicitante.');
			$('#orgao_id').focus();
		}
		else if(document.getElementById('unidade_id').selectedIndex == 0){
			criaAlerta(alerta, tipo, 'Selecione a unidade solicitante.');
			$('#unidade_id').focus();
		}

		else{
			retorno = true;
		}

		return retorno;
	}

	// função do submit do formulário
	$('#form_cad').on('submit', function(){
		if(valida()){

			return true;
		}
		else{
			return false;
		}
	});

	//função revela/esconde senha
    $( ".revela_senha" ).mousedown(function() {
      $(".senha").attr("type", "text");
    });

    $( ".revela_senha" ).mouseup(function() {
      $(".senha").attr("type", "password");
    });

});