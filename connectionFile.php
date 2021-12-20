<?php
// Connexion à la base de données
try { 
	$db = new PDO('mysql:host=localhost;dbname=client', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db;
	 }
 catch (Exception $e) { 
        die('Erreur : ' . $e->getMessage());
         }
?>         
