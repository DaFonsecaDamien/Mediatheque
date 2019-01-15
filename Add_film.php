<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Médiatheque</title>
  </head>
<body>


  <?php
// Début de la session
  session_start();
// Inclure la connexion base de donnée et le Header
  include('PDOtraitement/PDOconnect.php');
  include('Ressources/Header.php');
// Affichage des erreurs si il en existe
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset ($_SESSION['message']);
}

// Vérification pour savoir si l'utilisateur est connecté ou pas avec redirection
if(empty($_SESSION['id_user'])) {
    $_SESSION['message'] = 'Veuillez vous connecter, pour pouvoir ajouter un film';
    header('location: index.php');
}
   ?>




  <div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<!-- Formulaire d'ajout d'un film -->
    <div class="container" style="padding-top:50px;">
        <h2 class="text-center">Ajouter un film</h2></br>
    	<div class="row justify-content-center">
    		<div class="col-12 col-md-8 col-lg-6 pb-5">

                        <form action="PDOtraitement/PDOadd_film.php" method="post">
                            <div class="card border-dark rounded-0">
                                <div class="card-header p-0">
                                    <div class="bg-dark text-white text-center py-2">
                                        <h3>Information de votre film</h3>
                                        <p class="m-0">Veuillez remplir les champs</p>
                                    </div>
                                </div>
                                <div class="card-body p-3">

                                    <!--Body-->
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-film"></i></div>
                                            </div>
                                            <input type="text" class="form-control" name="nom" placeholder="Nom du film : 40 caractere max" required maxlength="40" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-file"></i></div>
                                            </div>
                                            <textarea class="form-control" name="resume" placeholder="Résumé" required maxlength="200"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-video"></i></div>
                                            </div>
                                            <input type="text" class="form-control" name="realisateur" placeholder="Réalisateur" required maxlength="40" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                            <input type="number" class="form-control" name="duree" placeholder="Durée du film en minute " required maxlength="3"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="input-group mb-2">
                                        <div class="input-group-text"><i class="fas fa-tags"></i></div>
                                        <select class="form-control" name="cat" required>
                                           <option>Sélectionner une catégorie</option>

                                          <?php
                                          // Préparation de la requete SLQ permettant d'avoir toute les catégories
                                            $req = $pdo->prepare("SELECT * FROM categorie");
                                            $req->execute();
                                            $result_cat = $req->fetchall();
                                          // Boucle permettant d'afficher les catégorie dans une barre déroulante
                                            foreach($result_cat as $cat)
                                          {

                                          ?>

                                        <option value="<?php echo $cat['RefCat'];?>"><?php echo $cat['categorie']; ?></option>

                                        <?php
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
                                            <textarea class="form-control" name="url" placeholder="Url de l'image du film" required maxlength="200"></textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" value="Ajouter" class="btn btn-dark btn-block rounded-0 py-2" />
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!--Form with header-->


                    </div>
    	</div>
    </div>
<!--Le peid de page-->

</body>
</html>
