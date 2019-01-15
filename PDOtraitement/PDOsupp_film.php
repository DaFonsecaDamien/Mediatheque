<?php
// Debut de la session
session_start();
// Connexion a la base de donnée
include('PDOconnect.php');

// Ligne permettant de savoir si l'utilisateur a cliqué sur un film ( Donc si il y a un GET['id'] ) Sinon redirection avec message
if(!empty($_GET['id']))
{
  // Mettre la valeur du GET dans une variable ID
    $id=$_GET['id'];
  // Preparation de la requete SQL permettant de supprimer le film et execution
    $delete = $pdo->prepare("DELETE FROM film WHERE id = ?");
    $delete->execute(array($id));
    header("location: ../films.php");

    $_SESSION['message'] = 'Film supprimer';
    header('location: ../films.php');
}
else {
  $_SESSION['message'] = 'Vous n\'avez pas accès à cette page';
  header('location: ../index.php');
}

?>
