<?php
// Debut de la session
session_start();
// Connexion a la base de donnée
include('PDOconnect.php');
// Vérifiaction pour savoir si l'utilisateur est connécté
if(!empty($_SESSION['id_user'])) {
    $_SESSION['message'] = 'Vous êtes déconnecter';
    header('location: ../index.php');
}

// Vérification des informations du formulaire et mettre les informations dans des variables
if(isset($_POST['nom']) && isset($_POST['resume']) && isset($_POST['realisateur']) && isset($_POST['duree']) && isset($_POST['cat']) && isset($_POST['url'])) {
    $nom = $_POST['nom'];
    $resume = $_POST['resume'];
    $realisateur = $_POST['realisateur'];
    $duree = $_POST['duree'];
    $cat = $_POST['cat'];
    $url = $_POST['url'];
    $id= $_SESSION['film_id'];

// Update de la base de donnée avec les informations tapé par l'utilisateur dans le formulaire redirection avec message
    $query=$pdo->prepare("UPDATE film SET  nom = :Nom, duree = :Duree, resume = :Resume, realisateur = :Realisateur,
                          RefCat = :Refcat, img = :Image WHERE id ='$id' ");
    $query->execute(array(
                      'Nom' => $nom,
                      'Duree' => $duree,
                      'Resume' => $resume,
                      'Realisateur' => $realisateur,
                      'Refcat' => $cat,
                      'Image' => $url,
                    ));

$_SESSION['message'] = 'Film modifier';
header('location: ../films.php');

    }
else {
    $_SESSION['message'] = 'Erreur un des champs est vide.';
    header('location: ../modifier_film.php');
      }


?>
