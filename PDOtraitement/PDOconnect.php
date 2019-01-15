<?php
// Connexion a la base de donnée
	try
	{
		$pdo= new PDO('mysql:host=localhost;dbname=mediatheque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
// Gestion d'erreur
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>
