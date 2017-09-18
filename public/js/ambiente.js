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

  // click btn chama modal
  $('#btn_cad').click(function(){
    $('#form_amb')[0].reset();
  });

  // revela-esconde senha

  $( ".revela_senha" ).mousedown(function() {
    $(".senha").attr("type", "text");
  });

  $( ".revela_senha" ).mouseup(function() {
    $(".senha").attr("type", "password");
  });

});
