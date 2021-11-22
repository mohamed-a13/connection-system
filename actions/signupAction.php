<?php
session_start();

require('actions/database.php');

if (isset($_POST['validate'])) {
  // Sécuriser les données contre les attaques xss
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $email = htmlspecialchars($_POST['email']);
  $errorMsg = "";
  $successMsg = "";
  if (!empty($pseudo) && !empty($lastname) && !empty($firstname) && !empty($email) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
    if (strlen($_POST['password']) == 8) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($_POST['password'] === $_POST['confirmPassword']) {
          $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

          //Vérification si l'utilisateur a déjà un compte
          $verifUserExist = $bdd->prepare('SELECT email FROM users WHERE email = ?');
          $verifUserExist->execute(array($email));

          if ($verifUserExist->rowCount() == 0) {

            //Inser les données
            $insertUser = $bdd->prepare("INSERT INTO users(pseudo, lastname, firstname, email, password) VALUES (:pseudo, :lastname, :firstname, '$email', '$password')");

            $insertUser->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $insertUser->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $insertUser->bindValue(':firstname', $firstname, PDO::PARAM_STR);

            // Exécution ! La requette est maintenant en base de données
            $insertUser->execute();

            $successMsg = "Le formulaire a bien été envoyé !";

            // Recuperation de l'id
            $lastId = $bdd->lastInsertId();

            //Récuperer les données de l'utilisateur
            $getInfoOfUser = $bdd->prepare("SELECT id, pseudo, firstname, lastname, email FROM users WHERE id = $lastId");
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
            $errorMsg = "L'utilisateur existe déjà !";
          }
        } else {
          $errorMsg = "Les mots de passes ne sont pas identiques";
        }
      } else {
        $errorMsg = "L'adresse email n'est pas correct !";
      }
    } else {
      $errorMsg = "Le mot de passe doit comporter 8 caractères !";
    }
  } else {
    $errorMsg = "Veuillez compléter tous les champs";
  }
}
