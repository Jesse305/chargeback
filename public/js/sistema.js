$(document).ready(function(){
	//click botao novo sistema
	$('#btn_cad').click(function(){
		$('#form_cad')[0].reset();
		limpaAlerta($('#alerta_cad'));
		$('#div_unidade').hide();

	});

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

	function validaCBDevs(){
		var cbs = document.getElementsByName('devs[]');
		var marcado = false;

		for(var i = 0; i < cbs.length; i++){
			if(cbs[i].checked == true){
				marcado = true;
			}
		}
		return marcado;
	}

	//função de validação
	function valida(){
		var retorno = false;
		if(validaCBDevs() == false){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione ao menos um Desenvolvedor');
			$('#dd_devs').focus();
		}
		else if(document.getElementById('slc_orgao').selectedIndex == 0){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione o Orgão Solictante');
			$('#slc_orgao').focus();
		}
		else if(document.getElementById('slc_unidade').selectedIndex == 0){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione a Unidade do Orgão');
			$('#slc_unidade').focus();
		}
		else if(document.getElementById('slc_banco').selectedIndex == 0){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione um Banco de Dados');
			$('#slc_banco').focus();
		}
		else if(document.getElementById('slc_ambSis').selectedIndex == 0){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione o Ambiente do sistema');
			$('#slc_ambSis').focus();
		}
		else if(document.getElementById('slc_amb').selectedIndex == 0){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione o ambiente do sistema');
			$('#slc_amb').focus();
		}
		else if(document.getElementById('slc_acesso').selectedIndex == 0){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione o tipo de acesso do sistema');
			$('#slc_acesso').focus();
		}
		else if(document.getElementById('slc_status').selectedIndex == 0){
			criaAlerta($('#alerta_cad'), 'warning', 'Selecione o status do sistema');
			$('#slc_status').focus();
		}
		else{
			retorno = true;
		}

		return retorno;
	}

	//funcão que recarrega página
	function recarregaPagina(){
		setTimeout(function(){
			window.location.reload();
		}, 2500);
		
	}

	//ajax carrega select unidades
	
	$('#slc_orgao').on('change', function(){
		var id_orgao = $(this).val();
		$.ajax({
			type: 'GET',
			dataType: 'json',
			data: '',
			url: '../unidade/json/'+id_orgao,
			beforeSend: function(){

			},
			success: function(unidades){
				$('#div_unidade').show();
				var options = "<option value=''>--Selecione--</option>";
				if(unidades.length > 0){

					for(var i = 0; i < unidades.length; i++){
                    options += '<option value='+ unidades[i].id +'>'+ unidades[i].no_unidade +'</option>';
               		}

				}else{
					options += "<option value=''> Sem registros </option>";
				}
                $('#slc_unidade').html(options).show();
			},
			error: function(){
				$('#slc_unidade').html("<option value=''>Sem registros</option>");
			}

		});

	});


	// submit form_cad
	$('#form_cad').on('submit', function(){		
		if(valida()){
		return false;
	});

});