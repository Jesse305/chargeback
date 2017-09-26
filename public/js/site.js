$(document).ready(function(){

	$('#btn_cad').click(function(){
		$('#form_cad')[0].reset();
		$('#alert_modal').empty();
		$('#btn_salvar').attr('disabled', false);
	});

	//carrega select unidade
	$('#orgao_id').on('change', function(){

		var id_orgao = $(this).val();
		$.ajax({
			type: 'get',
			dataType: 'json',
			data: id_orgao,
			url: '../unidade/json/'+id_orgao,
			success: function(dados){
				var option = "<option value=''>--Selecione--</option>";
				if(dados.length > 0){
					for(var i = 0; i < dados.length; i++){
						option += "<option value='"+ dados[i].id + "'>"+ dados[i].no_unidade +"</option>";
					}
				}else{
					option += "<option value='0'>Sem registros para o órgão</option>";
				}

				$('#unidade_id').html(option).show();
			}

		});

	});
	// fim ajax carrega select unidades

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

	function valida(){
		var retorno = false;
		var alerta = $('#alert_modal');
		var tipo = 'warning';
		if(document.getElementById('orgao_id').selectedIndex == 0){
			criaAlerta(alerta, tipo, 'Selecione o Órgão.');
			$('#orgao_id').focus();
		}
		else if(document.getElementById('unidade_id').selectedIndex == 0){
			criaAlerta(alerta, tipo, 'Selecione a Unidade.');
			$('#unidade_id');
		}
		else if($('#no_site').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o nome do Site.');
			$('#no_site').focus();
		}
		else if($('#ds_website').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o endereço do Site.');
			$('#ds_website').focus();
		}
		else if($('#ip_html').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o caminho do Servidor.');
			$('#ip_html').focus();
		}

		else{
			retorno = true;
		}

		return retorno;
	}

	$('#form_cad').on('submit', function(){
		if(valida()){
			//$('#btn_salvar').attr('disabled', true); descomentar depois
			return true;
		}
		else
		{
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