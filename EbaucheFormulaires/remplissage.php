<?php
	if(isset($_POST['nom']))		$nom = $_POST['nom'];
	else	$nom = "";
	
	if(isset($_POST['date']))		$date = $_POST['date'];
	else	$date = "";

try{
	
	include("pdo.php");
	
	if(isset($nom) AND isset($date)){

		$resultat = $pdo -> query("SELECT RepasMidi, Nuite, Etape, Km, Situation FROM FicheFrais F, Visiteur V WHERE F.idVisiteur = V.idVisiteur AND V.nom = '$nom' AND F.DateOperation = '$date'");
		
		$donnee = $resultat -> fetchAll(PDO::FETCH_NUM);
		
		foreach($donnee as $i)
		{
			
			$resultat[$i]['RepasMidi'] = $donnee['RepasMidi'];
			$resultat[$i]['Nuitee'] = $donnee['Nuite'];
			$resultat[$i]['Etape'] = $donnee['Etape'];
			$resultat[$i]['Km'] = $donnee['Km'];
			$resultat[$i]['Situation'] = $donnee['Sitution'];
			
		}
		
		echo json_encode($resultat);
		
		
		//header('Location : formValidFrais.php');

	}else{
		
		header('Location : formValidFrais.php');
		
	}
// SELECT RepasMidi, Nuite, Etape, Km, Situation FROM FicheFrais F, Visiteur V WHERE F.idVisiteur = V.idVisiteur AND V.nom = '$nom' AND F.DateOperation = '$date'

}

?>