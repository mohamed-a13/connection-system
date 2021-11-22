<?php
require('actions/updateAction.php');
require('actions/security.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php
$css = "update.css";
$title = "update";
include 'includes/head.php';
?>

<body>
  <?php include('includes/navbar.php') ?>
  <div class="container-form">

    <div class="form">

      <form method="post">
        <?php if (isset($successMsg)) {
          echo "<div style='display: flex; justify-content: center; height: 20px;'><p style='color: green;'>" . $successMsg . "</p></div>";
        } ?>
        <?php if (isset($errorMsg)) {
          echo "<div style='display: flex; justify-content: center; height: 20px; margin-bottom: 5px;'><p style='color: red';>" . $errorMsg . "</p></div>";
        } ?>
        <h2 class="text-dark">Modifier le compte</h2>
        <div class="mb-3">
          <label for="pseudo" class="form-label">Pseudo</label>
          <input type="text" class="form-control" id="pseudo" name=pseudo placeholder="<?= $_SESSION['pseudo'] ?>">
        </div>
        <div class="mb-3">
          <label for="lastname" class="form-label">Nom</label>
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?= $_SESSION['lastname'] ?>">
        </div>
        <div class="mb-3">
          <label for="firstname" class="form-label">Prénom</label>
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?= $_SESSION['firstname'] ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="<?= $_SESSION['email'] ?>">
        </div>
        <div class="btnUpdate">
          <button type="submit" class="btn btn-dark" name="validate">Modifier</button>
        </div>
      </form>

    </div>

  </div>

</body>

</html>