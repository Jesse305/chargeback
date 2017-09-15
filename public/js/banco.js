$(document).ready(function(){

    //limpa formulario
    function limpaForm(form){
        $(form)[0].reset();
        limpaAlerta('.alerta');
    }

    //click do botão chama modal
    $('#btn_cad').click(function(){
        limpaForm('#form_banco');
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

    //funções de alerta
    function limpaAlerta(div_alerta){
        $(div_alerta).empty();
    }


    function crialerta(div_alerta, tipo, msg){
        limpaAlerta(div_alerta);
        $(div_alerta).append(
            "<div class='alert alert-"+tipo+" alert-dismissable'>"+
              "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+
              msg+
            "</div>"
        );
    }

    //função de validação
    function valida(){
        var v = false;

        if(document.getElementById('slc_ambiente').selectedIndex == 0){
            crialerta('.alerta', 'warning', 'Selecione o Ambiente do Banco!');
            $('#slc_ambiente').focus();
        }
        else if(document.getElementById('slc_tecnologia').selectedIndex == 0){
            crialerta('.alerta', 'warning', 'Selecione a Tecnologia do Banco!');
            $('#slc_tecnologia').focus();
        }

        else{
            limpaAlerta('alerta');
            v = true;
        }

        return v;
    }

    //submit do form cadastrar
    $('#form_banco').on('submit', function(){

        var retorno = false;

        if(valida()){
            retorno = true;
        }

        return retorno;

    });

	//função data table jquery
    $('#tab_resumo').dataTable();

    //função revela/esconde senha
    $( "#revela_senha" ).mousedown(function() {
      $("#senha").attr("type", "text");
    });

    $( "#revela_senha" ).mouseup(function() {
      $("#senha").attr("type", "password");
    });

});