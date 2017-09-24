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

	//click do botão chama modal cadastro
	$('#btn_cad').click(function(){
		$('#form_unidade')[0].reset();
		$('#alert_modal').empty();
	});

	function valida(){
		var retorno = false;
		var alerta = $('#alert_modal');
		if(document.getElementById('orgao_id').selectedIndex == 0){
			criaAlerta(alerta, 'warning', 'Selecione o Orgão da Unidade');
			$('#orgao_id').focus();
		}
		else if(document.getElementById('cidade_id').selectedIndex == 0){
			criaAlerta(alerta, 'warning', 'Selecione qual cidade pertence o Unidade');
			$('#cidade_id').focus();
		}
		else{
			retorno = true;
		}
		return retorno;
	}

	// submit do form cadastro
	$('#form_unidade').on('submit', function(){

		if(valida()){
			limpaAlerta($('#alert_modal'));
			$('#btn_salvar').attr('disabled', true);
			return true;
		}
		else{
			return false;
		}

	});


});

// função mascara maiuscula
function maiuscula(ma){
	mi = ma.value.toUpperCase();
	ma.value = mi;
}

function confirmaDeleta(url){
	if(window.confirm('Deseja realmente apagar o registro?')){
		window.location = url;
	}
}