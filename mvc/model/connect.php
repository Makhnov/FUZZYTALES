<?php
//Connexion à la BDD fuzzyTales
$bdd = new PDO('mysql:host=localhost;dbname=fuzzyTales','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$bdd->exec("set names utf8");
?>