<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=connection_system;charset=utf8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die("Une erreur s'est produite: " . $e->getMessage());
}
