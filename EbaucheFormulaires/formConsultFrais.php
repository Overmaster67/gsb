<html>
<head>
	<meta charset="UTF-8">
	<title>Suivi des frais de visite</title>
	<style type="text/css">
		<!-- body {background-color: white; color:5599EE; } 
			.titre { width : 180 ;  clear:left; float:left; } 
			.zone { float : left; color:7091BB } -->
	</style>
	<!-- Importation de JQuery -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#dateConsult").datepicker({
				altField: "#datepicker",
				closeText: 'Fermer',
				prevText: 'Précédent',
				nextText: 'Suivant',
				currentText: 'Aujourd\'hui',
				monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
				monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
				dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
				dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
				dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
				weekHeader: 'Sem.', dateFormat: 'dd-mm-yy' }
			);
		});
		
	</script>
</head>
<body>

<div name="gauche" style="clear:left:;float:left;width:18%; background-color:white; height:100%;">
<div name="coin" style="height:10%;text-align:center;"><img src="logo.jpg" width="100" height="60"/></div>
<div name="menu" >
	<h2>Outils</h2>
	<ul><li>Frais</li>
		<ul>
			<li><a href="formSaisieFrais.htm" >Nouveau</a></li>
			<li><a href="formConsultFrais.htm">Consulter</a></li>
		</ul>
	</ul>
</div>
</div>
<div name="droite" style="float:left;width:80%;">
	<div name="haut" style="margin: 2 2 2 2 ;height:10%;float:left;"><h1>Suivi de remboursement des Frais</h1></div>	
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
	<form name="formConsultFrais" method="post" action="chercheFrais.php">
		<h1> Période </h1>
			<label class="titre">Mois/Année :</label> <input class="zone" type="text" id="dateConsult" name="dateConsult" size="12" />
		<p class="titre" />
		<div style="clear:left;"><h2>Frais au forfait </h2></div>
		<table style="color:white;" border="1">
			<tr><th>Repas midi</th><th>Nuitée </th><th>Etape</th><th>Km </th><th>Situation</th><th>Date opération</th><th>Remboursement</th></tr>
			<tr align="center"><td width="80"><label  size="3" name="repas"/></td>
				<td width="80"><label size="3" name="nuitee"/></td> 
				<td width="80"> <label size="3" name="etape"/></td>
				<td width="80"> <label size="3" name="km" /></td>
				<td width="80"> <label size="3" name="situation" /></td>	
				<td width="80"> <label size="3" name="dateOper" /></td>	
				<td width="80"> <label size="3" name="dateOper" /></td>						
			</tr>
		</table>
		
		<p class="titre" /><div style="clear:left;"><h2>Hors Forfait</h2></div>
		<table style="color:white;" border="1">
			<tr><th>Date</th><th>Libellé </th><th>Montant</th><th>Situation</th><th>Date opération</th></tr>
			<tr align="center"><td width="100" ><label size="12" name="hfDate1"/></td>
				<td width="220"><label size="30" name="hfLib1"/></td> 
				<td width="90" ><label size="10" name="hfMont1"/></td>
				<td width="80"> <label size="3" name="hfSitu1" /></td>
				<td width="80"> <label size="3" name="hfDateOper1" /></td>		
				</tr>
		</table>	
		<p class="titre"></p>
		<div class="titre">Nb Justificatifs</div><input type="text" class="zone" size="4" name="hcMontant"/>
	</form>
	</div>
</div>
</body>
</html>