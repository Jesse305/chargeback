$(document).ready(function(){

	//limpa formulario
    function limpaForm(form){
        $(form)[0].reset();
    }

     //click do botão chama modal
    $('#btn_cad').click(function(){
        limpaForm('#form_dev');
    });

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


});