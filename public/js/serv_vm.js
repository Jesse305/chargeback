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
    });

    //carrega o select unidade
    $('#orgao_id').on('change', function(){
        var orgao_id = $(this).val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '../../unidade/json/'+orgao_id,
            success: function(unidades){
                var option = "<option value=''>--Selecione a unidade--</option>";
                if(unidades.length > 0){
                    for(var i = 0; i < unidades.length; i++){
                        option += "<option value=" + unidades[i].id + ">" + unidades[i].no_unidade + "</option>";
                    }
                }else{
                    option = "<option value=''> Sem registros. </option>";
                }

                $('#unidade_id').html(option).show();
            }

        }); 
    });

    //carrega o select responsavel
    $('#unidade_id').on('change', function(){
        var unid_id = $(this).val();
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '../../responsaveis/json/'+unid_id,
            success: function(resps){
                var options = "<option value=''>--Selecione o Responsável--</opton>";
                if(resps.length > 0){
                    for(var i = 0; i < resps.length; i++){
                        options += "<option value="+ resps[i].id +">" + resps[i].no_responsavel + "</option>";
                    }
                }else{
                    options = "<option value='0'>Sem registros</option>";
                }
                $('#responsavel_id').html(options).show();
            }
        });
    });

    $('#btn_salvar').attr('disabled', false);

    $('#btn_salvar').click(function(){
        $(this).attr('disabled', true);
    });

});

function confirmaDeleta(url){
	if(window.confirm('Deseja realmente apagar o registro?')){
		window.location = url;
	}
}