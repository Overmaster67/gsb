<?php

try{

$pdo = new PDO('mysql:host=mysql-gsbrlm.alwaysdata.net;dbname=gsbrlm_db', 'gsbrlm', 'TheMDP');

}	
catch(PDOException $e){
$message = 'ERREUR dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
die($message);
}

?>