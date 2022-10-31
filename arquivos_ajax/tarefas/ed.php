<?php
	include_once('../../app_comp_php/funcoes_bd.php');
	include_once('../../app_comp_php/funcoes_tratamento.php');
	
	$bd = new banco_dados();
	
	$cod = trata_numero($_POST['cod']);

	$sql = 'SELECT titulo FROM tarefas WHERE cod = '.$cod;
	$query = $bd->select($sql);
	$dado = $bd->row($query);
?>
<a class="fechar" onClick="fecharModal();">
	<span aria-hidden="true" onClick="fecharModal();">&times;</span>
</a>

<div>
	
	<form action='' id='formulario'>

        <h4>Editar Item</h4>
	
		<input name='cod' id='cod' type='hidden' value='<?php echo $cod; ?>'>
		
		<span>Título:</span>
		<input class='form-control' id='titulo' placeholder='Título' type='text' value='<?php echo $dado['titulo']; ?>'>

		<button type="button" onClick="ed_tarefa()">Salvar</button>
	
	</form>
		
</div>

