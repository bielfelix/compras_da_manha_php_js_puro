<?php

function trata_numero($numero){
	
	$array = array("'", "!", "@", "#", "$", "%", "¨", "&", "*", "(", ")", "-", "_", "=", "+", "§", "{", "}", "[", "]", "/", ";", ":", "?", "<", ">", ".", ",", '|', "\\", '"');

    $aux0 = str_replace($array, "", $numero);
	
	return addslashes(preg_replace('/[^0-9]/', '',$aux0));
}

function trata_texto($texto){
	
	$array = array("'", "¨", "&", "=", "§", "{", "}", "[", "]", ";", "<", ">", '|', "\\", '"');

    $aux0 = str_replace($array, "", $texto);
	
	$aux0 = str_replace("à", "á", $aux0);
	$aux0 = str_replace("è", "é", $aux0);
	$aux0 = str_replace("ì", "í", $aux0);
	$aux0 = str_replace("ò", "ó", $aux0);
	$aux0 = str_replace("ù", "ú", $aux0);
	
	$aux0 = str_replace("À", "Á", $aux0);
	$aux0 = str_replace("È", "É", $aux0);
	$aux0 = str_replace("Ì", "Í", $aux0);
	$aux0 = str_replace("Ò", "Ó", $aux0);
	$aux0 = str_replace("Ù", "Ú", $aux0);
	
	return addslashes($aux0);
}


?>