<?php
session_start();
$id = $_SESSION['id'];
require('./database.php');

$sql = "DELETE FROM users WHERE id = $id";
$deleteUser = $bdd->prepare($sql);
$deleteUser->execute();

header("Location: ../delete-compte.php");
