<?php
session_start();
// Connexion à la BDD
include('../model/connect.php');
include('../model/set.php');
include('../model/get.php');
include('../model/model_displayArticle.php');
include('../vue/userProfile.php');
include('../model/profile.php');


$user=$_SESSION['mail_utilisateur'];

echo(displayByUser($bdd,$id_utilisateur));




?>