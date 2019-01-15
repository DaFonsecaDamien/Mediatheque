<!-- JAVASCRIPT / BOOTSTRAP et autre fonctionnalité -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Début de la NavBar -->
<nav class="navbar navbar-dark bg-dark header-top navbar-expand-md navbar-expand-lg navbar-expand-xl">
<a class="navbar-brand" href="index.php"><img style="width: 200px; height: 100px;" src="Ressources/img/logo.jpg" alt="" title="" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

      <div class="collapse navbar-collapse show">
          <ul class="navbar-nav animate side-nav">
            <li class="nav-item"><a class="nav-link" href="films.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Films</a></li>

<!-- Savoir si l'utilisateur est connécté ou pas pour changer la barre de nav -->
<?php if(isset($_SESSION['id_user'])) { ?>

<li class="nav-item"><a class="nav-link" href="Add_film.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Ajouter</a></li>
  </ul>
</div>

      <form class="form-inline my-2 my-lg-0" role="form" method="post" action="PDOtraitement/PDOusers_deco.php">
      <button type="submit" class="btn btn-default"><font size=2>Déconnexion</font></button>
    </form>

<?php } else { ?>

</ul>
</div>

  <form class="form-inline my-2 my-lg-0" role="form" method="post" action="PDOtraitement/PDOusers_connect.php">
      <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" required>


          <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-default"><b><font size=2>Connexion</font></b></button>
  </form>

<a class='btn btn-danger' href="inscription.php" role="button"><b><font size=2>S'inscrire</font></b></a>

<?php } ?>
      </div>
</nav>
