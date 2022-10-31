<?php
	include_once('../../app_comp_php/funcoes_bd.php');
	include_once('../../app_comp_php/funcoes_tratamento.php');
	
	$bd = new banco_dados();
	
	$titulo = trata_texto($_POST['titulo']);

	$sql = 'INSERT INTO tarefas (titulo) VALUES ("'.$titulo.'")';
	$query = $bd->insert($sql);
?>