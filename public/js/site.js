$(document).ready(function(){

	//altera idioma labels da tabela
		$('#tab_resumo').DataTable( {
				"language": {
						"lengthMenu": "Mostrar _MENU_ resultados por página",
						"zeroRecords": "Nenhum resultado!",
						"info": "Página _PAGE_ de _PAGES_",
						"infoEmpty": "Não há resultado",
						"search" : "Pesquisar",
						"paginate": {
						"first":      "Primeira",
						"last":       "Última",
						"next":       "Próxima",
						"previous":   "Anterior"
						}
				}
		} );

		//função data table jquery
		$('#tab_resumo').dataTable();

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
			url: 'unidade/json/'+id_orgao,
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
			$('#unidade_id').focus();
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
		else if($('#no_dns').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o endereço do Publicador');
			$('#no_dns').focus();
		}
		else if($('#usuario_analytics').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o usuário da conta Google Analytics');
			$('#usuario_analytics').focus();
		}
		else if($('#senha_analytics').val() == ''){
			criaAlerta(alerta, tipo, 'Informe a senha da conta Google Analytics');
			$('#senha_analytics').focus();
		}
		else if($('#codigo_analytics').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o código da conta Google Analytics');
			$('#codigo_analytics').focus();
		}
		else if($('#ip_banco').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o IP do Banco de Dados');
			$('#ip_banco').focus();
		}
		else if($('#usuario_banco').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o usuário do Banco de Dados');
			$('#usuario_banco').focus();
		}
		else if($('#pwd_banco').val() == ''){
			criaAlerta(alerta, tipo, 'Informe a senha do Banco de Dados');
			$('#pwd_banco').focus();
		}
		else if($('#esquema_banco').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o Schema do Banco de Dados');
			$('#esquema_banco').focus();
		}
		else if($('#prefixo_tabela').val() == ''){
			criaAlerta(alerta, tipo, 'Informe o prefixo da Tabela');
			$('#prefixo_tabela').focus();
		}

		else{
			retorno = true;
		}

		return retorno;
	}

	$('#form_cad').on('submit', function(){
		if(valida()){
			$('#btn_salvar').attr('disabled', true);
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

function confirmaDeleta(url){
	if(window.confirm('Deseja realmente apagar o Registro?')){
		window.location.href = url;
	}
}
