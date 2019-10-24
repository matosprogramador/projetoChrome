var quant_result_pg = 5;
var pagina = 1;

$(document).on('click', '#delete_todos',function(){

 var eventos = document.querySelectorAll('[name=eventos]:checked');
  var values = [];
  for (var i = 0; i < eventos.length; i++) {
  	
    values.push(eventos[i].value);
  }
  if(values.length < 1){
  	alert('Selecione pelo menos 1 evento.')
  	return false;
  }

  else if (values.length > 1){
  	document.getElementById('corpo_modal').innerHTML = 'Deseja deletar esses eventos ? <br> '+ values;
  	$('#del').attr('data-id',values);
  	$('#modalExemplo').modal('show');
  	return false;
  }
  else if(values.length == 1){
  	document.getElementById('corpo_modal').innerHTML = 'Deseja deletar esse evento ? ';
  	$('#del').attr('data-id',values);
  	$('#modalExemplo').modal('show');
	return false;
  }

});




$(document).on('click', '#del', function(){
	var id = $('#del').attr('data-id');
	var pg = $('#del').attr('href');
	var q_pg = $('#del').attr('html');

	console.log(id);

	deleta_evento(id);
	listar_usuario(pg,q_pg);

});

function confirmacao(idEvento){

	$('#del').attr('data-id',idEvento);

	$('#modalExemplo').modal('show');
	
}

function deleta_evento(idEvento){
	

	$.ajax({
		method: "POST",
		url: "consulta_eventoDelete.php",
		data: {idEvento:idEvento}
	})
}


function listar_usuario(pagina, quant_result_pg){

	
		var nome = $('#input').val();


		$.ajax({
		  method: "POST",
		  url: "consulta_evento.php",
		  data: {data:nome , pagina : pagina,
			quant_result_pg : quant_result_pg},
		  beforeSend: function(data){
			  console.log("uhuuuu");
				$('.mask-loading').show(); 
			  
          },
		  
		  success:function (data)  {
			setTimeout(function(){
			 
				$('.mask-loading').hide();
			 document.getElementById('dados').innerHTML = data;
			 $('#dados').attr('class','col');
			}, 1000);
			 
 		
	  },
	  	dataType:'html'
		});
		return false;
	};