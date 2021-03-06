$(document).ready(function(){

     //click do botão chama modal
    $('#btn_cad').click(function(){
        $('#btn_salvar').attr('disabled', false);
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

    $('#form_dev').on('submit', function(){
        $('#btn_salvar').attr('disabled', true);
    });

});

function confirmaDeleta(url){
    if(window.confirm('Deseja realmente apagar o registro?')){
        window.location = url;
    }
}