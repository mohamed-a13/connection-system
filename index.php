<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php
$css = "acceuil1.css";
$title = "Acceuil";
include 'includes/head.php';
?>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Titre</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <?php
            if (isset($_SESSION['auth'])) {
              echo "<a class='nav-link active' href='acceuil.php'>Home</a>";
            } else {
              echo "<a class='nav-link active' href='index.php'>Home</a>";
            }
            ?>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="signup.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="login.php">Connexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h1>Utilisateur non connecté</h1>
  </div>

</body>

</html>