<?php

	include_once('../../app_comp_php/funcoes_bd.php');
	include_once('../../app_comp_php/funcoes_tratamento.php');
	
	$bd = new banco_dados();
	
	$cod = trata_numero($_POST['cod']);

	$sql = 'DELETE FROM tarefas WHERE cod = '.$cod;
	$query = $bd->delete($sql);
	
?>