<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				
		<title>Compras da Manhã</title>
		 
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<link href="arquivos_css/bootstrap.min.css" rel="stylesheet">		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
		<link href="arquivos_css/site.css?<?php echo rand(); ?>" rel="stylesheet">

		<script src="arquivos_jsc/fontwasome.js"></script>		
		<script src="arquivos_jsc/jquery-3.6.0.min.js"></script>
		<script src="arquivos_jsc/bootstrap.min.js"></script>
		<script src="arquivos_jsc/ajax.js?<?php echo rand(); ?>"></script>
	
		
	</head>
	<body>

		<div class="screen">
			<div class="head">
				<h3>Compras da Manhã</h3>
			</div>
			<div class="register">
				<input type="text" class="form-control" placeholder="Adicionar Item" id="register_title">
				<button type="button" onClick="ca_tarefa()" id="register_button">Adicionar</button>
			</div>
			<div class="tarefas"></div>
		</div>

		<div class="back-box-modal animate__animated" onClick="fecharModal()"></div>
		<div class="box-modal animate__animated"></div>	
	
	</body>
</html>		