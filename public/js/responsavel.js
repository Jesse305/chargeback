$(document).ready(function(){

	$('#btn_cad').click(function(){
		$('#form_resp')[0].reset();
	});

	// tabela resumo
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
    });

	$('#tab_resumo').dataTable();

	// carrega select unidade
	$('#orgao_id').on('change', function(){
		var idOrgao = $(this).val();
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url: '../unidade/json/'+idOrgao,
			success: function(unidade){
				var option = "<option value=''>--Selecione--</option>";
				if(unidade.length > 0){

					for(var i = 0; i < unidade.length; i++){
						option += "<option value="+ unidade[i].id +">"+ unidade[i].no_unidade +"</option>";
					}

				}
				else{
					option += "<option value='0'>Sem Registros</option>";
				}

				$('#unidade_id').html(option).show();
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

	function valida(){
		var retorno = false;
		var alerta = $('#alert_modal');
		if(document.getElementById('orgao_id').selectedIndex == 0){
			criaAlerta(alerta, 'warning', 'Selecione o Órgão');
			$('#orgao_id').focus();
		}
		else if(document.getElementById('unidade_id').selectedIndex == 0){
			criaAlerta(alerta, 'warning', 'Selecione a Unidade');
			$('#unidade_id').focus();
		}
		else if($('#no_responsavel').val() == ''){
			criaAlerta(alerta, 'warning', 'Informe o nome do Responsável');
			$('#no_responsavel').focus();
		}
		else if($('#nu_telefone').val() == ''){
			criaAlerta(alerta, 'warning', 'Informe o telefone do Responsável');
			$('#nu_telefone').focus();
		}
		else{
			retorno = true;
		}

		return retorno;
	}

	$('#form_resp').on('submit', function(){

		if(valida()){
			$('#btn_salvar').attr('disabled', true);
			return true;
		}else{
			return false;
		}

	});

});