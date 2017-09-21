$(document).ready(function(){

	//inicia select unidade
	document.getElementById('slc_unidade').disabled=true;


	//função carrega select unidade
	$('#slc_orgao').on('change', function(){
		document.getElementById('slc_unidade').disabled=false;
		var id_orgao = $(this).val();
		$.ajax({
			type: 'GET',
			dataType: 'json',
			data: '',
			url: '../../unidade/json/'+id_orgao,
			beforeSend: function(){

			},
			success: function(unidades){
				var options = "<option value=''>--Selecione--</option>";
				if(unidades.length > 0){

					for(var i = 0; i < unidades.length; i++){
                    options += '<option value='+ unidades[i].id +'>'+ unidades[i].no_unidade +'</option>';
               		}

				}else{
					options += "<option value='0'> Sem registros </option>";
				}
                $('#slc_unidade').html(options).show();
			},
			error: function(){
				$('#slc_unidade').html("<option value='' >Sem registros</option>");
			}

		});

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

	function valida(){
		var retorno = false;
		if($('#slc_unidade').val() == ''){
			criaAlerta($('#alerta'), 'warning', 'Selecione a unidade solicitante.');
			$('#slc_unidade').focus();
		}
		else if(validaCBDevs() == false){
			criaAlerta($('#alerta'), 'warning', 'Selecione ao menos um desenvolvedor.');
			$('#dd_devs').focus();
		}else{
			retorno = true;
		}
		return retorno;
	}

	// submit form_cad
	$('#form_sis').on('submit', function(){	

		if(valida()){
			$('#btn_alterar').attr('disable', 'disable');
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