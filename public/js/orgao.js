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

	//função limpa formulario
	$('#btn_cad').click(function(){
		$('#form_orgao')[0].reset();
		$('#btn_salvar').attr('disabled', false);
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
		var alerta = $('#alert_form');
		if(document.getElementById('tp_orgao').selectedIndex == 0){
			criaAlerta(alerta, 'warning', 'Selecione o tipo do Orgão.');
			$('#tp_orgao').focus();
		}
		else if(document.getElementById('status').selectedIndex == 0){
			criaAlerta(alerta, 'warning', 'Selecione o Status do Orgão.');
			$('#status').focus();
		}

		else{
			retorno = true;
		}

		return retorno;
	}

	//submit formulario
	$('#form_orgao').on('submit', function(){

		if(valida()){
			$('#btn_salvar').attr('disabled', true);
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
//função confirma antes de deletar
function confirmaDeleta(url){
	if(window.confirm('Deseja realmente apagar o registro?')){
		window.location = url;
	}
}