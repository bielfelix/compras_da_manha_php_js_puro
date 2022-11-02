<?php

	include_once('../../app_comp_php/funcoes_bd.php');
	
	$bd = new banco_dados();

	$sql = 'DELETE FROM tarefas WHERE status = 2';
	$query = $bd->delete($sql);
	
?>