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
  if(!empty($_SESSION['id_user'])) {
      $_SESSION['message'] = 'Vous êtes déja inscrit !';
      header('location: index.php');
  }

   ?>

<!-- Formulaire d'inscription -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container" style="padding-top:50px;">
    <h2 class="text-center">Formulaire d'inscription</h2></br>
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 pb-5">

                    <form action="PDOtraitement/PDOinscription.php" method="post">
                        <div class="card border-dark rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-dark text-white text-center py-2">
                                    <h3>Vos informations</h3>
                                    <p class="m-0">Veuillez remplir les champs</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                        </div>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                        </div>
                                        <input type="password" class="form-control" name="password2" placeholder="Validation du mot de passe" required />
                                    </div>
                                </div>


                                <div class="text-center">
                                    <input type="submit" value="S'inscrire" class="btn btn-dark btn-block rounded-0 py-2" />
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
  </div>
</div>
<!--Le peid de page-->

</body>
</html>
