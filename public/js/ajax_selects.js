$(document).ready(function(){
	//preenche select unidade
	$('#orgao_id').on('change', function(){
		var orgao_id = $(this).val();
		$.ajax({
			type: 'get',
			dataType : 'json',
			url: '../unidade/json/'+orgao_id,
			success: function(unidades){
				var options = "<option value=''>--Selecione a Unidade--</option>";
				if(unidades.length > 0){
					for(var i = 0; i < unidades.length; i++){
						options += "<option value="+ unidades[i].id +">"+ unidades[i].no_unidade +"</option>";
					}
				}else{
					options += "<option value='0'>Sem registros</option>";
				}
				$('#unidade_id').html(options).show();
			}
		});
	});

	//preenche select responsavel
	$('#unidade_id').on('change', function(){
		var unidade_id = $(this).val();
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: '../responsaveis/json/'+unidade_id,
			success: function(responsaveis){
				var options = "<option value=''>--Selecione o Responsável--</option>";
				if(responsaveis.length > 0){
					for(var i = 0; i < responsaveis.length; i++){
						options += "<option value="+ responsaveis[i].id +">"+ responsaveis[i].no_responsavel +"</option>";
					}
				}else{
					options += "<option value='0'>Sem registros</option>";
				}
				$('#responsavel_id').html(options).show();
			}
		});
	});


});