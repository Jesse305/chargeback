$(document).ready(function(){

		//inicia select unidade
		document.getElementById('slc_unidade').disabled=true;


		//função carrega select unidade
		$('#slc_orgao').on('change', function(){
			document.getElementById('slc_unidade').disabled=false;
			var id_orgao = $(this).val();
			$.ajax({
				type: 'GET',
				dataType: 'json',
				data: '',
				url: '../../unidade/json/'+id_orgao,
				beforeSend: function(){

				},
				success: function(unidades){
					var options = "<option value=''>--Selecione--</option>";
					if(unidades.length > 0){

						for(var i = 0; i < unidades.length; i++){
	                    options += '<option value='+ unidades[i].id +'>'+ unidades[i].no_unidade +'</option>';
	               		}

					}else{
						options += "<option value=''> Sem registros </option>";
					}
	                $('#slc_unidade').html(options).show();
				},
				error: function(){
					$('#slc_unidade').html("<option value=''>Sem registros</option>");
				}

			});

		});

});