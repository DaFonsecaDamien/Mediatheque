<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Médiatheque</title>
  </head>
<body>
  <!--Le corps-->

  <?php
  // Début de la session
  session_start();
  // Inclure la connexion base de donnée et le Header
  include('PDOtraitement/PDOconnect.php');
  include('Ressources/Header.php');
  // Affichage des erreurs si il en existe
if(isset($_SESSION['message']))
{
  ?>
  <div class="alert alert-info" role="alert">
  <?php echo $_SESSION['message']; ?>
  </div>

  <?php
  unset ($_SESSION['message']);
}
   ?>



 <div class="container" style="padding-top:50px;">

<!-- Boucle permettant de savoir si l'utilisateur est connecté ou pas pour afficher un message différent -->
<?php if(isset($_SESSION['id_user'])) { ?>

  <div class="jumbotron" >
    <h1>Le Cinéma La Strada vous souhaite la bienvenue</h1></br></br>
    <p>Dans l'onglet "film" vous pouvez maitenant modifier et supprimer un film.</p>
    <p>Un nouvel onglet est apparu pour rajouter un film.</p>
    <p>Vous pouvez donc ajouter le film de votre choix, amusez-vous bien !</p>

  </div>

<?php } else { ?>

  <div class="jumbotron" >
    <h1>Le Cinéma La Strada</h1>
    <p>Vous trouverez ici toute les informations nécessaire sur nos films (auteur, date, résumé et autres).</p>
    <p>Les films sont répertorié et trié pour que vous puissiez trouver ce qui vous faut.</p></br>
    <p>
      <b>Ne tardez plus et commencé à vous creer un compte ! <a class='btn btn-danger' href="inscription.php" role="button"><b><font size=2>S'inscrire</font></b></a> </b></br>
    </br>
      <b> Informations sur le cinéma </b></br>
      Cinéma multiplex 8 salles spacieuses et confortables de 86 à 335 places
      Les 8 salles sont équipées de projecteurs Sony 4K parmi elles, deux sont compatible 3D et une équipée en son DOLBY ATMOS.
      Accès optimisé pour les personnes à mobilité réduite dans tous les espaces.
      Une séance par semaine sous-titrée SME.
      Une programmation de films hétéroclite.
      Une programmation hors cinéma : Opéras, Ballets, Théâtre, spectacles vivants, concerts….
    </p>
    <p>
      <b>Mentions légales</b></br>
      Atlantic ciné > Infos pratiques > Mentions légales</br>
      Responsable de la publication</br>
      SARL BROCELIANDE – Taillandier Daniel</br>
      Parc Les Coteaux – 17100 SAINTES</br>
      Tél. : 33 (0)5 46 92 49 60 – Siret 45248106200019</br>
      RCS Saintes B 452 481 062 </br></br>

      Conception</br>
      Agence de communication Aggelos</br>
      www.aggelos.fr </br></br>

      Hébergement</br>
      PHPNET</br>
      3 rue des Pins</br>
      38000 GRENOBLE</br>
      Tél: 04 82 53 02 10</br>
  </div>

<?php } ?>
 </div>
</body>
</html>
