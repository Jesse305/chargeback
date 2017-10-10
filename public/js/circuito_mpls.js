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

});

// confirma apagar
function confirmaDeleta(url){
	if(window.confirm('Deseja realmente apagar o registro?')){
		window.href = url;
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

