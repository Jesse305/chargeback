$(document).ready(function(){

	//configurando tabela
	$('#tab_resumo').DataTable({
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

	//disabilita botão salvar após click
	$('#btn_salvar').attr('disabled', false);
	$('#btn_salvar').click(function(){
		$('#btn_salvar').attr('disabled', true);
	});

});

// confirma apagar
function confirmaDeleta(url){
	if(window.confirm('Deseja realmente apagar o registro?')){
		window.location = url;
	}
}

//mascaras
$('.nu_ip').mask('099.099.099.099');

$('.dtp').datetimepicker({
    language:  'pt-BR',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0
});

