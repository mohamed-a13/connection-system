<?php
session_start();
require('actions/database.php');

if (isset($_POST['validate'])) {
  // Sécuriser les données contre les attaques xss
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars(($_POST['password']));
  $errorMsg = "";
  $successMsg = "";
  if (!empty($email) && !empty($_POST['password'])) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      //Vérification de l'adresse email
      $verifUserExist = $bdd->prepare('SELECT id, pseudo, firstname, lastname, email, password FROM users WHERE email = ?');
      $verifUserExist->execute(array($email));

      if ($verifUserExist->rowCount() > 0) {

        //Verification du mot de passe
        $userInfo = $verifUserExist->fetch();
        if (password_verify($password, $userInfo['password'])) {

          //Authentification de l'utilisateur
          $_SESSION['auth'] = true;
          $_SESSION['id'] = $userInfo[0];
          $_SESSION['pseudo'] = $userInfo[1];
          $_SESSION['firstname'] = $userInfo[2];
          $_SESSION['lastname'] = $userInfo[3];
          $_SESSION['email'] = $userInfo[4];

          header('Location: acceuil.php');
        } else {
          $errorMsg = "L'adresse mail ou le mot de pas n'est pas correct ! !";
        }
      } else {
        $errorMsg = "L'adresse mail ou le mot de pas n'est pas correct !";
      }
    } else {
      $errorMsg = "L'adresse email n'est pas correct !";
    }
  } else {
    $errorMsg = "Veuillez compléter tous les champs";
  }
}
