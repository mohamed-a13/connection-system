<?php
session_start();
$_SESSION = [];
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="fr">
<?php
$css = "delete.css";
$title = "delete-compte";
include 'includes/head.php';
?>

<body>
  <div class="container">
    <div>
      <h1>Votre compte a bien été supprimé, Merci de votre visite 👍</h1>
      <a href="index.php">Retour à la page d'acceuil</a>
    </div>
  </div>
</body>

</html>