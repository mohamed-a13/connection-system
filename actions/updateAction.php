<?php
session_start();
require("actions/database.php");

if (isset($_POST['validate'])) {
  // Sécuriser les données contre les attaques xss
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $email = htmlspecialchars($_POST['email']);
  $id = htmlspecialchars($_SESSION['id']);
  $errorMsg = "";
  $successMsg = "";
  if (!empty($pseudo) && !empty($lastname) && !empty($firstname) && !empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      //Vérification si l'utilisateur a déjà un compte
      $verifUserExist = $bdd->prepare('SELECT email FROM users WHERE id = ?');
      $verifUserExist->execute(array($email));

      if ($verifUserExist->rowCount() == 0) {

        //Modifier les données
        $sql = "UPDATE users SET pseudo='$pseudo', firstname='$firstname', lastname='$lastname', email='$email' WHERE id = $id";

        $modif = $bdd->prepare($sql);

        // Exécution ! La requette est maintenant en base de données
        $modif->execute();


        //Récuperer les données de l'utilisateur
        $getInfoOfUser = $bdd->prepare("SELECT id, pseudo, firstname, lastname, email FROM users WHERE id = $id");
        $getInfoOfUser->execute(array($info));
        $userInfo = $getInfoOfUser->fetch();

        $_SESSION['auth'] = true;
        $_SESSION['id'] = $userInfo[0];
        $_SESSION['pseudo'] = $userInfo[1];
        $_SESSION['firstname'] = $userInfo[2];
        $_SESSION['lastname'] = $userInfo[3];
        $_SESSION['email'] = $userInfo[4];

        header('Location: acceuil.php');
      } else {
        $errorMsg = "Cette adresse mail est déjà utilisé !";
      }
    } else {
      $errorMsg = "L'adresse email n'est pas correct !";
    }
  } else {
    $errorMsg = "Veuillez compléter tous les champs";
  }
}
