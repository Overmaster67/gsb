<?php
try{
	include('pdo.php');
	
	// récupération des données du formulaire
	
	if(isset($_POST['lstVisiteur']))	$nom=$_POST['lstVisiteur'];
	else	$nom="";

	if(isset($_POST['dateValid']))	$dateOp=$_POST['dateValid'];
	else	$dateOp="";
	
	if(isset($_POST['repas']))		$repas=$_POST['repas'];
	else	$repas="";
	
	if(isset($_POST['nuitee']))		$nuitee=$_POST['nuitee'];
	else	$nuitee="";
	
	if(isset($_POST['etape']))		$etape=$_POST['etape'];
	else	$etape="";
	
	if(isset($_POST['km']))		$km=$_POST['km'];
	else	$km="";
	
	if(isset($_POST['situ']))		$situ1=$_POST['situ'];
	else	$situ1="";
	
	if(isset($_POST['hfDate1']))		$date=$_POST['hfDate1'];
	else	$date="";
	
	if(isset($_POST['hfLib1']))		$libelle=$_POST['hfLib1'];
	else	$libelle="";
	
	if(isset($_POST['hfMont1']))		$montant=$_POST['hfMont1'];
	else	$montant="";
	
	if(isset($_POST['hfSitu1']))		$situ2=$_POST['hfSitu1'];
	else	$situ2="";
	
	if(isset($_POST['hcMontant']))		$nbJustif=$_POST['hcMontant'];
	else	$nbJustif="";
	
		/*
		// Sinon
		// Script d'autocompletion
		$nombreVisiteur = $pdo -> query("select count(*) as nb from visiteur V, ficheFrais F where V.nom = '$nom' and F.DateOperation = '$dateOp'");
		$requete = "SELECT idVisiteur, nomVisiteur, RepasMidi, Nuite, Etape, Km, Situation FROM Visiteur V, FicheFrais F
		WHERE V.idVisiteur = F.idVisiteur AND V.nom = '$nom' AND F.DateOperation = '$dateOp'";
		$execute = $pdo -> query($requete);
		$resultat = $execute -> fetchAll(PDO::FETCH_NUM);
		while($i < nomVisiteur -> fetch(PDO::FETCH_NUM)){
			
			$resultat[$i]['RepasMidi'];
			$resultat[$i]['Nuitee'];
			$resultat[$i]['Etape'];
			$resultat[$i]['Km'];
			$resultat[$i]['Situation'];
			
		}
		*/
			
		if(empty($nom) OR empty($dateOp) OR empty($repas) OR empty($nuitee) OR empty($etape) OR empty($km) OR empty($situ1) OR empty($date) OR empty($libelle) OR empty($montant) OR empty($situ2) OR empty($nbJustif)){
			
			header('formValidFrais.php');
			
		}else{
		// Seulement si tout les champs sont remplis
		$requete = "SELECT idVisiteur FROM Visiteur WHERE nom = '$nom'";
		$execute = $pdo -> query($requete);
		$resultat = $execute -> fetch(PDO::FETCH_NUM);
		// Remplacer les inserts par des Updates
		$requete = "INSERT INTO FicheFrais VALUES('$resultat', '$dateOp', '$repas', '$nuitee', '$etape', '$km', '$situ1', NULL, $nbJustif', NULL, NULL, NULL);
					INSERT INTO LigneFraisHorsForfait VALUES(NULL, '$resultat', '$date', '$libelle', '$montant', '$situ2', '$dateOp');
					INSERT INTO LigneFraisForfait VALUES('$resultat', '$dateOp', 'REP', '$repas');
					INSERT INTO LigneFraisForfait VALUES('$resultat', '$dateOp', 'NUI', '$nuitee');
					INSERT INTO LigneFraisForfait VALUES('$resultat', '$dateOp', 'ETP', '$etape');
					INSERT INTO LigneFraisForfait VALUES('$resultat', '$dateOp', 'KM', '$km');";
		$resultatInsert = $pdo -> query($requete);
		
		header('formValidFrais.php');
		
		}
	}
?>