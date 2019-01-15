<?php
// Debut de la session
session_start();
// Connexion a la base de donnée
include('PDOconnect.php');
// Vérifiaction pour savoir si l'utilisateur est connécté
if(isset($_SESSION['id'])) {
    $_SESSION['message'] = 'Erreur vous êtes déjà connecté.';
    header('location: ../index.php');
}
// Vérification pour savoir si l'utilisateur a bien entrer un mdp et un email
if(isset($_POST['email']) or isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
}
else
{
    $_SESSION['message'] = 'Erreur un des champs est vide.';
    header('location: ../index.php');
}
// Préparation de la requête SQL permettant de selctionner les information de la base avec le mdp et email
$query = $pdo->prepare("SELECT * FROM informations WHERE email = ? AND password = ?");
$query->execute([
    $email,
    $password,
]);

$result = $query->fetch(2);
// Connexion de l'utilisateur avec redirection ou message d'erreur
if($result) {
    $_SESSION['id_user'] = $result['id'];
    $_SESSION['message'] = 'vous etes connecté.';
    header('location: ../index.php');
} else {
    $_SESSION['message'] = 'Erreur mauvais identifiant.';
    header('location: ../index.php');
}

 ?>
