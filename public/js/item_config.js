$(document).ready(function(){

	//click botão chama modal
	$('#btn_cad').click(function(){
		$('#form_item')[0].reset();
		$('#btn_salvar').attr('disabled', false);

	});

	//Configura a tabela resumo
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

	// validação
	function valida(){
		var retorno = false;
		var alerta = $('#alert_modal');
		var tipoMsg = 'warning';
		if(document.getElementById('no_categoria').selectedIndex == 0){
			criaAlerta(alerta, tipoMsg, 'Selecione a categoria do Item.');
			$('#no_categoria').focus();
		}
		else{
			retorno = true;
		}
		return retorno;
	}

	// submit do formulario de cadastro
	$('#form_item').on('submit', function(){
		if(valida()){
			$('#btn_salvar').attr('disabled', true);
			limpaAlerta($('#alert_modal'));
			return true;
		}
		else{
			return false;
		}
	});


});

//confirma deleta
function confirmaDeleta(url){
	if(window.confirm('Deseja realmente apagar o registro?')){
		window.location = url;
	}
}