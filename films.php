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

<!-- Container de toute la page -->
<div class="container" style="padding-top:50px;">

<!-- Division de la barre de recherche -->
  <div  class="d-flex justify-content-center" class="input-group">
       <form action="films.php" method="post">
    <input class="form-control py-2 border-right-0 border" type="Recherche" name="search" placeholder="Recherche" id="example-search-input" />
      </form>
    <span class="input-group-append">
          <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
    </span>
</div></br></br>

<!-- Catégorie permettant d'avoir les films de A a Z -->
<div class="row" >
  <form action="films.php" method="post" class="btn hover col-md-20" >
            <button type="submit" name="all" value="all" class="card mb-2 box-shadow" >
                  <div class="text-center">
                  </br><img style="width: 50px; height: 50px;" class="card-img-top" src="Ressources/img/all.png">
                  </div>
                    <div class="card-body">
                        <p class="card-text">Les Films</p>
                    </div>
                </button>
  </form>


<?php
// Preparation de la barre de choix des catégorie avec une selection des Categorie
  $r = $pdo->prepare("SELECT * FROM categorie");
  $r->execute();
  $result_cat = $r->fetchall();
// Boucle permettant d'afficher l'image le nom des catégorie et L'iD
  foreach($result_cat as $cat)
{

?>
            <div>
              <form action="films.php" method="post" class="btn hover col-md-20" >
                        <button type="submit" name="tri_cat" value="<?php echo $cat['RefCat']; ?>" class="card mb-2 box-shadow" >
                          <div class="text-center">
                          </br><img style="width: 50px; height: 50px;" class="card-img-top" src="Ressources/img/<?php echo $cat['ImgCat']; ?>">
                          </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $cat['categorie']; ?></p>
                                </div>
                            </button>
                </form>
              </div>
<?php
  }
?>

</div></br>

<!-- Division pour voir tous les films-->
<div class="row">

<?php
// Vérification des choix de l'utilisateur si la barre de recherche ou la barre de catégorie a été choisit
// Préparation des même reqûete pour avoir toute les informations ( WHERE ) + la condition choisit
if(empty($_POST['search']) && empty($_POST['tri_cat']) || isset($_POST['ALL']))
{
  $req = $pdo->prepare("SELECT film.id, film.nom, film.duree, film.resume, film.realisateur, film.img, categorie.categorie AS categorie FROM film INNER JOIN categorie ON film.RefCat = categorie.RefCat ORDER BY nom");
  $req->execute();
  $result = $req->fetchall();
}
elseif(isset($_POST['search']))
{
  $search=$_POST['search'];
  $search = strtoupper($search);
  $req = $pdo->prepare("SELECT film.id, film.nom, film.duree, film.resume, film.realisateur, film.img, categorie.categorie AS categorie FROM film INNER JOIN categorie ON film.RefCat = categorie.RefCat WHERE UPPER(nom) LIKE '%$search%' ");
  $req->execute();
  $result = $req->fetchall();
}
elseif(isset($_POST['tri_cat']))
{
  $tri_cat=$_POST['tri_cat'];
  $req = $pdo->prepare("SELECT film.id, film.nom, film.duree, film.resume, film.realisateur, film.img, categorie.categorie AS categorie FROM film INNER JOIN categorie ON film.RefCat = categorie.RefCat WHERE categorie.RefCat='$tri_cat'");
  $req->execute();
  $result = $req->fetchall();
}
if(empty($result))
{
  echo '<h3> Pas de Résultat<h3>';
}

// Boucle permettant d'afficher les films dans des card
foreach($result as $film)
{


  ?>


<div class="col-md-4">
  		<!--Card-->
              <div class="card">
                  <!--Card image-->
                  <img class="img-fluid" style="width: 500px; height: 520px;" src="<?php echo $film['img']; ?>" alt="Card image cap">

                  <!--Card content-->
                  <div class="card-body">
                      <!--Title-->
                      <h3 class="card-title"><?php echo $film['nom']; ?></h3>
                      <!--Text-->

                      <h3 class="card-text"><?php echo $film['resume']; ?></h3></br>
                    <ul class="list-group list-group-flush">
                      <li><h3 class="card-text">Réalisateur : <?php echo $film['realisateur'];?></h3></li>
                      <li><h3 class="card-text">Durée : <?php echo $film['duree'];?> minutes</h3></li>
                      <li><h3 class="card-text">Catégorie : <?php echo $film['categorie'];?></h3></li>
                    </ul></br>

<!-- Boucle permettant de savoir si l'utilisateur est connecté ou pas pour afficher les boutons -->
<?php if(isset($_SESSION['id_user'])) { ?>

                      <a href="PDOtraitement/PDOsupp_film.php?id=<?php echo $film["id"];?>" class="btn btn-primary">Supprimer</a>
                      <a href="modifier_film.php?id=<?php echo $film["id"];?>" class="btn btn-primary">Modifier</a>

<?php }?>

                  </div>
              </div></br></br></br></br>
          <!--/.Card-->
        </div>


<?php
}
 ?>
</div>
</div>
</body>
</html>
