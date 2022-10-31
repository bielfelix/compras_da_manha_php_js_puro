
<?php
	include_once('../../app_comp_php/funcoes_bd.php');
	include_once('../../app_comp_php/funcoes_tratamento.php');
	
	$bd = new banco_dados();
	
	$cod = trata_numero($_POST['cod']);

	$status = trata_numero($_POST['status']);
	
	$sql = 'UPDATE tarefas SET status = '.$status.' WHERE cod = '.$cod;
	$query = $bd->update($sql);
?>