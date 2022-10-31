
$( document ).ready(function() {
    lista_atual();
});

function abrirModal(){
	$('.back-box-modal').show();
	$('.back-box-modal').addClass('animate__fadeIn');
	
	$('.box-modal').show();
	$('.box-modal').addClass('animate__bounce');
	
	$("html, body").animate({ scrollTop: 0 }, "slow");
}

function fecharModal(){
	
	$('.box-modal').addClass('animate__fadeOut');
	$('.back-box-modal').addClass('animate__fadeOut');
	$('.box-modal').removeClass('animate__fadeOut');
	$('.back-box-modal').removeClass('animate__fadeOut');
	
	$('.back-box-modal').hide();
	$('.box-modal').hide();
	$('.box-modal').html('');
}

function lista_atual(){
	
	var load = "<img src='arquivos_img/load.gif' class='loadGif'>";
	
	$.ajax({
		type: "POST",
		url: "arquivos_ajax/tarefas/listar.php",
		beforeSend: function(retorno) {
			$('.tarefas').html(load);
		},
		success: function(retorno) {
			$('.tarefas').html(retorno);
		}
	});
}

function ca_tarefa(){
	
	var load 		= "<img src='arquivos_img/load.gif' class='loadGif'>";
	var verifica 	= false;
	var titulo 		= $('#register_title').val();
	
	if(titulo == ''){	
		verifica = true;
		$('#register_title').addClass('errorInput');
	}else{
		$('#register_title').removeClass('errorInput');
	}
	
	if(verifica){	
		alert('Preencha todos os campos obrigatórios!');		
	}else{
		$('#register_title').val('');
		$('#register_button').html('Adicionando..');

		$.ajax({
			type: "POST",
			url: "app_blocos_ed/tarefas/ca.php",
			data: {titulo: titulo},
			beforeSend: function(retorno) {
				$('.tarefas').html(load);
			},
			success: function(retorno) {
				lista_atual();
				$('#register_button').html('Adicionar');
			}
			
		});
		
	}
}

function modal_ed_tarefa(cod){

	abrirModal();
	
	var load = "<img src='arquivos_img/load.gif' class='loadGif'>";
	
	$.ajax({
		type: "POST",
		url: "arquivos_ajax/tarefas/ed.php",
		data: {cod: cod},
		beforeSend: function(retorno) {
			$('.box-modal').html(load);
		},
		success: function(retorno) {
			$('.box-modal').html(retorno);
		}
	});
}

function ed_tarefa(){
	
	var load 		= "<img src='arquivos_img/load.gif' class='loadGif'>";
	var verifica 	= false;
	var titulo 		= $('#titulo').val();
	var cod 		= $('#cod').val();
	
	if(titulo == ''){	
		verifica = true;
		$('#titulo').addClass('errorInput');
	}else{
		$('#titulo').removeClass('errorInput');
	}
	
	if(verifica){	
		alert('Preencha todos os campos obrigatórios!');		
	}else{

		$.ajax({
			type: "POST",
			url: "app_blocos_ed/tarefas/ed.php",
			data: {cod: cod, titulo: titulo},
			beforeSend: function(retorno) {
				$('.tarefas').html(load);
			},
			success: function(retorno) {
				lista_atual();
				fecharModal();
			}
			
		});
		
	}
}

function status_tarefa(cod, status){
	
	var load = "<img src='arquivos_img/load.gif' class='loadGif'>";

	$.ajax({
		type: "POST",
		url: "app_blocos_ed/tarefas/ed_status.php",
		data: {cod: cod, status: status},
		beforeSend: function(retorno) {
			$('.tarefas').html(load);
		},
		success: function(retorno) {
			lista_atual();
		}
		
	});
		
	
}
			
function ex_tarefa(cod){

	var load = "<img src='arquivos_img/load.gif' class='loadGif'>";
	
	if(confirm('Tem certeza que desaja excluir?')){
		
		$.ajax({
			type: "POST",
			url: "app_blocos_ed/tarefas/ex.php",
			data: {cod: cod},
			beforeSend: function(retorno) {
				$('.tarefas').html(load);
			},
			success: function(retorno) {
				lista_atual();
			}
		});	
	}	
}			
			
			
			
			
			
			
			
			