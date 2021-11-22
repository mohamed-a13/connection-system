<?php
require('actions/signupAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php
$css = "signup.css";
$title = "signup";
include 'includes/head.php';
?>

<body>

  <div class="container-form">

    <div class="form">

      <form method="post">
        <?php if (isset($errorMsg)) {
          echo "<div style='min-width: 280.88px; height: 35px; position: absolute; top: 550px; left: 50%; transform: translateX(-50%);' class='d-flex justify-content-center align-items-center'><p style='color: red;'>" . $errorMsg . "</p></div>";
        } else ?>
        <h2 class="text-dark">Inscription</h2>
        <div class="mb-3">
          <label for="pseudo" class="form-label">Pseudo</label>
          <input type="text" class="form-control" id="pseudo" name=pseudo>
        </div>
        <div class="mb-3">
          <label for="lastname" class="form-label">Nom</label>
          <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
          <label for="firstname" class="form-label">Prénom</label>
          <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
        </div>
        <div class="btnSignup">
          <button type="submit" class="btn btn-dark" name="validate">S'inscrire</button>
        </div>
        <div class="btnReturn">
          <a class="text-dark" href="login.php">Vous possedez déjà un compte ?</a><br>
        </div>
        <div class="btnReturn">
          <a class="text-dark" href="index.php">Retour à la page d'acceuil</a>
        </div>
      </form>

    </div>

  </div>

</body>

</html>