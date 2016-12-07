<?php
	date_default_timezone_set("Europe/Paris");
	$jour = date("d");
	$mois = date("m");
	$annee = date("Y");
	
	if($jour < 10){
	
		$mois = $mois - 1;
	
	}

?>