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

// Vérification pour savoir si l'utilisateur est connecté ou pas avec redirection
  if(empty($_SESSION['id_user'])) {
      $_SESSION['message'] = 'Veuillez vous connecter, pour pouvoir modifier un film';
      header('location: index.php');
  }

   ?>

   <?php
// Boucle permettant de savoir si l'utilisateur a cliqué sur un film ou pas avec le GET['id']
   if(!empty($_GET['id']))
   {
     // Mettre la valeur du GET dans une variable id
       $id=$_GET['id'];
    // Mettre la variable de id dans une SESSION pour pouvoir avec la valeur sur la page PDOtraitement/PDOmodif_film.php
       $_SESSION['film_id'] = $id;
    // Préparation de la requete SQL permerttant de connâitre toute les informations du film quand l'id est égal a celui du film (variable id)
       $req = $pdo->prepare("SELECT film.id, film.nom, film.duree, film.resume, film.realisateur, film.img, categorie.categorie AS categorie FROM film INNER JOIN categorie ON film.RefCat = categorie.RefCat WHERE id = ?");
       $req->execute(array($id));
       $result = $req->fetch();
   }
   else
   {
     $_SESSION['message'] = 'Aucun film sélectionné';
     header('location: films.php');
   }

   ?>

<!--Formulaire pour laisser l'utilisateur modifier les informations-->
  <div id="corps">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <div class="container" style="padding-top:50px;">
        <h2 class="text-center">Modifier les informations du film</h2></br>
    	<div class="row justify-content-center">
    		<div class="col-12 col-md-8 col-lg-6 pb-5">


                        <form action="PDOtraitement/PDOmodif_film.php" method="post">
                            <div class="card border-dark rounded-0">
                                <div class="card-header p-0">
                                    <div class="bg-dark text-white text-center py-2">
                                        <h3>Information du film</h3>
                                        <p class="m-0">Veuillez changer les champs</p>
                                    </div>
                                </div>
                                <div class="card-body p-3">

                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-film"></i></div>
                                            </div>
                                            <input type="text" class="form-control" name="nom" value="<?php echo $result['nom']; ?>" required maxlength="40"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-file"></i></div>
                                            </div>
                                            <input type="text" class="form-control" name="resume" value="<?php echo $result['resume']; ?>" required maxlength="200"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-video"></i></div>
                                            </div>
                                            <input type="text" class="form-control" name="realisateur" value="<?php echo $result['realisateur']; ?>" required maxlength="40"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                            <input type="text" class="form-control" name="duree" value="<?php echo $result['duree']; ?>" required maxlength="3"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="input-group mb-2">
                                        <div class="input-group-text"><i class="fas fa-tags"></i></div>
                                        <select class="form-control" name="cat" required>

                                          <?php
                                          // Préparation de la requete pour avoir les catégories
                                            $req = $pdo->prepare("SELECT * FROM categorie");
                                            $req->execute();
                                            $result_cat = $req->fetchall();
                                          // Boucle permettant d'afficher les catégorie dans une barre déroulant
                                            foreach($result_cat as $cat)
                                          {
                                            // Boucle pour savoir quelle est la catégorie du film séléctionné et mettre l'option en "selected"
                                              if($cat['categorie'] == $result['categorie'])
                                              {
                                          ?>

                                        <option selected="selected" value="<?php echo $cat['RefCat'];?>"><?php echo $cat['categorie']; ?></option>

                                        <?php
                                        }
                                        else
                                        {
                                        ?>

                                        <option value="<?php echo $cat['RefCat'];?>"><?php echo $cat['categorie']; ?></option>

                                        <?php
                                          }
                                          }
                                        ?>

                                        </select>
                                      </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-code"></i></div>
                                            </div >
                                            <input type="text" class="form-control" name="url" value="<?php echo $result['img']; ?>" required maxlength="200"/>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" value="Modifier" class="btn btn-dark btn-block rounded-0 py-2" />
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
    	</div>
    </div>
</body>
</html>
