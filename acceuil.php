<?php
session_start();
require('actions/security.php');


?>
<!DOCTYPE html>
<html lang="fr">
<?php
$css = "acceuil2.css";
$title = "Acceuil";
include 'includes/head.php';
?>

<body>
  <?php include('includes/navbar.php') ?>
  <div class="container">
    <h1>Utilisateur connecté</h1>
  </div>

</body>

</html>