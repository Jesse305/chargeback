$(document).ready(function(){

	//preenche select unidade
	$('#orgao_id').on('change', function(){
		var orgao_id = $(this).val();
		$.ajax({
			type: 'get',
			dataType : 'json',
			url: '../../unidade/json/'+orgao_id,
			success: function(unidades){
				var options = "<option value=''>--Selecione a Unidade--</option>";
				if(unidades.length > 0){
					for(var i = 0; i < unidades.length; i++){
						options += "<option value="+ unidades[i].id +">"+ unidades[i].no_unidade +"</option>";
					}
				}else{
					options += "<option value='0'>Sem registros</option>";
				}
				$('#unidade_id').html(options).show();
			}
		});
	});

	//preenche select responsavel
	$('#unidade_id').on('change', function(){
		var unidade_id = $(this).val();
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: '../../responsaveis/json/'+unidade_id,
			success: function(responsaveis){
				var options = "<option value=''>--Selecione o Responsável--</option>";
				if(responsaveis.length > 0){
					for(var i = 0; i < responsaveis.length; i++){
						options += "<option value="+ responsaveis[i].id +">"+ responsaveis[i].no_responsavel +"</option>";
					}
				}else{
					options += "<option value='0'>Sem registros</option>";
				}
				$('#responsavel_id').html(options).show();
			}
		});
	});

    function selectBancos(){
		
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url: '../../bancos/json',
			success: function(bancos){
				var option = "<option value=''>--Selecione--</option>";
				if(bancos.length > 0){
					for(var i = 0; i < bancos.length; i++){
						option += "<option value="+ bancos[i].id_banco +">Schema: "+ bancos[i].schema_banco + " / Ambiente: " + bancos[i].ambiente_banco + "</option>";
					}

				}else{
					option +=  "<option value=''>--sem registros--</option>";
				}

				$('.nb').html(option).show();
			}
		});
    }

    $('#btn_remove').click(function(){
    	$('#linha').remove();
    });

    $('#adiciona').click(function(){
    	selectBancos();
    	$('#bancos').append(
    		"<div id='linha'>"+
    			"<div>"+
    				"<div class='input-group'>"+
		    			"<span class='input-group-addon'>Banco Dados:</span>"+
		    			"<select class='form-control nb' name='id_banco[]' id='slc_banco' > "+
		    			"</select>"+
		    		"</div>"+
    			"</div>"+
    		"</div>"
    	);
    });

    //remove banco no formulário de alterar
    $('.remove_bd').click(function(){
    	$('#id_edt_banco').value = '';
    	$(this).parents('#div_edtBanco').remove();
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

	function validaBancos(){
		var bancos = document.getElementsByName('id_banco[]');
		var retorno = false;
		
		if(bancos.length > 1){
			retorno = true;
		}
		return retorno;
	}

	//função de validação
	function valida(){
		var retorno = false;
		if(validaCBDevs() == false){
			criaAlerta($('#alerta'), 'warning', 'Selecione ao menos um Desenvolvedor');
			$('#dd_devs').focus();
		}
		else if(document.getElementById('orgao_id').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione o Orgão Solictante');
			$('#orgao_id').focus();
		}
		else if(document.getElementById('unidade_id').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione a Unidade a Unidade');
			$('#unidade_id').focus();
		}
		else if(document.getElementById('responsavel_id').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione o Responsável');
			$('#responsavel_id').focus();
		}
		else if(validaBancos() == false){
			criaAlerta($('#alerta'), 'warning', 'Informe ao menos um banco');
			alert('Informe ao menos um banco');
		}

		else if(document.getElementById('slc_banco').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione um Banco de Dados ou remova o campo vazio');
			$('#slc_banco').focus();
		}

		else if(document.getElementById('slc_ambSis').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione o Desenvolvimento do sistema');
			$('#slc_ambSis').focus();
		}
		else if(document.getElementById('slc_amb').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione o ambiente do sistema');
			$('#slc_amb').focus();
		}
		else if(document.getElementById('slc_acesso').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione o tipo de acesso do sistema');
			$('#slc_acesso').focus();
		}
		else if(document.getElementById('slc_status').selectedIndex == 0){
			criaAlerta($('#alerta'), 'warning', 'Selecione o status do sistema');
			$('#slc_status').focus();
		}
		else{
			retorno = true;
		}

		return retorno;
	}

	// submit form_cad
	$('#form_sis').on('submit', function(){	

		if(valida()){
			$('#btn_alterar').attr('disabled', true);
			limpaAlerta($('#alerta'));
			return true;
		}else{
			return false;
		}

	});

});

// função mascara maiuscula
function maiuscula(ma){
	mi = ma.value.toUpperCase();
	ma.value = mi;
}