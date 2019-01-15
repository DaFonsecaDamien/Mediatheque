<?php
// Début de la session
session_start();
// Ajout de la connexion a la base de donnée
include('PDOconnect.php');

// Vérifiaction Si l'utilisateur est connecté ou pas
if(isset($_SESSION['id_user'])) {
    $_SESSION['message'] = 'Vous n\'avez pas accès à cette page';
    header('location: ../index.php');
}
else {

// Vérification de si il y a des informations et mettre les informations des POST dans des variables
if(isset($_POST['nom']) && isset($_POST['resume']) && isset($_POST['realisateur']) && isset($_POST['duree']) && isset($_POST['cat']) && isset($_POST['url'])) {
    $nom = $_POST['nom'];
    $resume = $_POST['resume'];
    $realisateur = $_POST['realisateur'];
    $duree = $_POST['duree'];
    $cat = $_POST['cat'];
    $url = $_POST['url'];
} else {
    $_SESSION['message'] = 'Erreur un des champs est vide.';
    header('location: ../add_film.php');
}
// Préparation de la requête SQL pour entrer des valeurs dans la base de donnée
$query = $pdo->prepare('INSERT INTO film (nom, duree, resume, realisateur, RefCat, img) VALUES (?,?,?,?,?,?)');
$query->execute(array(
    $nom,
    $duree,
    $resume,
    $realisateur,
    $cat,
    $url,
));

// Ligne permettant de savoir si une ligne a été ajouté et redirection avec messages
if($query->rowCount()) {
    $_SESSION['message'] = 'Le film a été ajouté';
    header('location: ../films.php');
} else {
    $_SESSION['message'] = 'Erreur lors de l\'ajout.';
    header('location: ../Add_film.php');
}
}
?>
