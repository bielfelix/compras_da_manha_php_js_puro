
<?php
	include_once('../../app_comp_php/funcoes_bd.php');
	include_once('../../app_comp_php/funcoes_tratamento.php');
	
	$bd = new banco_dados();
	
	$cod = trata_numero($_POST['cod']);

	$titulo = trata_texto($_POST['titulo']);
	
	$sql = 'UPDATE tarefas SET titulo = "'.$titulo.'" WHERE cod = '.$cod;
	$query = $bd->update($sql);
?>