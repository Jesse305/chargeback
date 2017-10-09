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