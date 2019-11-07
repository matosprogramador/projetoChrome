var quant_result_pg = 5;
var pagina = 1;

$(document).on('click',"#check", function(){
	console.log('oi');
	var confirmar = document.querySelectorAll('[name=check]:checked');
	if (confirmar.length >= 1 ){
		if (
		valida_campo('slc') ||
		valida_campo('data2') ||
		valida_campo('hora2') ||
		valida_campo('example-date-input')  ){

		document.getElementById("bot").disabled = true;
		document.getElementById("check").checked = false;
		}else{
		document.getElementById("bot").disabled = false;
		}
		
	}
	
}) 


//função para validar formulário em tempo real;
function valida_campo(id){
	var campo = document.getElementById(id);
	var data1= document.getElementById('data');
	var hora1= document.getElementById('hora');

	if (campo.value == ''){
		document.getElementById(id+'1').innerHTML = '<p style="color:red;">Todos campos devem ser preenchidos.</p>';
		document.getElementById("bot").disabled = true;
		document.getElementById("check").checked = false;
		return true;
	}
	if(campo.value != ''){
		document.getElementById(id+'1').innerHTML = '';
	}

	if(campo.name == 'data2'){

		if(campo.value < data1.value){
			document.getElementById(id+'1').innerHTML = '<p style="color:red;">Segunda data menor que a primeira.</p>';
			document.getElementById("bot").disabled = true;
			document.getElementById("check").checked = false;
			return true;
		}else{
			document.getElementById(id+'1').innerHTML = '';
		}
	}

	if(campo.name == 'hora2'){

		if(campo.value < hora1.value){
			document.getElementById(id+'1').innerHTML = '<p style="color:red;">Segundo horário menor que o primeiro.</p>';
			document.getElementById("bot").disabled = true;
			document.getElementById("check").checked = false;
			return true;
		}else{
			document.getElementById(id+'1').innerHTML = '';
		}
	}

	if(campo.name == 'quantidade'){

		if(campo.value > 80 ){
			document.getElementById(id+'1').innerHTML = '<p style="color:red;">Quantidade muito alta.</p>';
			document.getElementById("bot").disabled = true;
			document.getElementById("check").checked = false;
			return true;
		}else{
			document.getElementById(id+'1').innerHTML = '';
		}
	}

    
	
	
}

// função para criar popup de resposta ao usuário 
$(document).ready(function(){
	$('#chrome').on('submit', function (e){
	  e.preventDefault();
	  var data = $(this).serialize();
	  $.ajax({
		dataType:'json',
		url:'processar.php',
		method:'post',
		data:data,
		success:function(nome){
		  console.log(nome);
		  $('#toast-place').append(` 
			<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-delay="5000">
				<div class="toast-header bg-`+nome.color+`">
					<strong class="mr-auto text-white" >`+nome.title+`</strong>
					<small class="text-white">Agora</small>
					<button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">`+
					nome.mensagem + `
				</div>
			</div>`)
	
		$('.toast').toast('show');
		console.log('show');
		$('.toast').on('hidden.bs.toast', e=> {
			$(e.currentTarget).remove();
			console.log('hide')
			})
	  }
	}); this.reset();
  })	
})
	  
	
   


//função que verificar todos os checkbox e abre um modal para confirmação
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



//função para para deletar evento ( botão dentro do modal)
$(document).on('click', '#del', function(){
	var id = $('#del').attr('data-id');
	var pg = $('#del').attr('href');
	var q_pg = $('#del').attr('html');

	console.log(id);

	deleta_evento(id);
	listar_usuario(pg,q_pg);

});
//funcão para confirmação usada nos botoes laterais e teem elementos flex
function confirmacao(idEvento){

	$('#del').attr('data-id',idEvento);

	$('#modalExemplo').modal('show');
	
}

//função para deletar um ou mais eventos no bd
function deleta_evento(idEvento){
	

	$.ajax({
		method: "POST",
		url: "consulta_eventoDelete.php",
		data: {idEvento:idEvento},
		success: function(data){
			$('#toast-place').append(` 
			<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-delay="3000">
			  <div class="toast-header bg-success">
				<strong class="mr-auto text-white" >Parabéns</strong>
				<small class="text-white">Agora</small>
				<button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			  </div>
			<div class="toast-body">
			  Evento(s) apagado(s) com sucesso!
			</div>
		  </div>
				  `)
			
			$('.toast').toast('show');
  
			console.log("show");
  
			$('.toast').on('hidden.bs.toast', e=> {
			  $(e.currentTarget).remove();
			  console.log('hide')
			})
			
		}
	})
}

//função para buscar eventos
function listar_usuario(pagina, quant_result_pg){

	
		var nome = $('#input').val();


		$.ajax({
		  method: "POST",
		  url: "consulta_evento.php",
		  data: {data:nome , pagina : pagina,
			quant_result_pg : quant_result_pg},
		  beforeSend: function(data){
			  	$('#botaoBusca').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')
				$('.mask-loading').show(); 
			  
          },
		  
		  success:function (data)  {
			setTimeout(function(){
				$('#botaoBusca').html('consultar');
				$('.mask-loading').hide();
			 document.getElementById('dados').innerHTML = data;
			 $('#dados').attr('class','col');
			}, 1000);
			 
 		
	  },
	  	dataType:'html'
		});
		return false;
	};