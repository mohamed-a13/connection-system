<?php require('actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<?php
$css = "login.css";
$title = "login";
include 'includes/head.php'
?>

<body>
  <div class="container-form">

    <div class="form">

      <form method="post">
        <?php if (isset($errorMsg)) {
          echo "<div style='min-width: 280.88px; height: 35px; position: absolute; top: 150px; left: 50%; transform: translateX(-50%);' class='error d-flex justify-content-center align-items-center' role='alert'><p>" . $errorMsg . "</p></div>";
        } ?>
        <h2 class="text-dark">Connexion</h2>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="btnLogin">
          <button type="submit" class="btn btn-dark" name="validate">Se connecter</button>
        </div>
        <div class="btnReturn">
          <a class="text-dark" href="signup.php">Je ne possède pas de compte !</a>
        </div>
        <div class="btnReturn">
          <a class="text-dark" href="acceuil.php">Retourner à la page d'acceuil ?</a>
        </div>
      </form>

    </div>

  </div>
</body>

</html>