<?php
// Debut de la session
session_start();
// Connexion a la base de donnée
include('PDOconnect.php');
// Vérifiaction pour savoir si l'utilisateur est connécté
if(isset($_SESSION['id_user'])) {
    $_SESSION['message'] = 'Erreur vous etes déjà connecté.';
    header('location: ../index.php');
}

// Vérification des informations du formulaire et mettre les informations dans des variables
if(isset($_POST['email']) OR isset($_POST['password']) OR isset($_POST['password2'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
} else {
    $_SESSION['message'] = 'Erreur un des champs est vide.';
    header('location: ../inscription.php');
}

// Vérification si le mot de passe 1 est égal au mot de passe 2
if($password != $password2) {
    $_SESSION['message'] = 'Erreur les deux mots de passe sont différents.';
    header('location: ../inscription.php');
}
//Préparation de la requete SQL permettant d'inserer des informations dans la base de donnée
$query = $pdo->prepare('INSERT INTO informations (email, password) VALUES (?,?)');
$query->execute(array(
    $email,
    $password,
));

//Ligne permettant de savoir si une ligne a été ajouté et redirection avec message
if($query->rowCount()) {
    $_SESSION['message'] = 'vous etes inscrit.';
    header('location: ../index.php');
} else {
    $_SESSION['message'] = 'Erreur lors de l\'inscription.';
    header('location: ../index.php');
}

?>
