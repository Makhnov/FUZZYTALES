<?php

// Connexion à la BDD
include('../model/connect.php');
include('../model/set.php');
include('../model/get.php');
include('../model/model_displayArticle.php');

//include('../model/profile.php');

function connexion2($bdd,$mail_utilisateur){
    $loginError = "";
  try {

    // Prepare the SQL statement
    $requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail_utilisateur = :mail_utilisateur");
    $requete->execute(array(
        'mail_utilisateur'=>$mail_utilisateur
    ));

    // Fetch the result
    $result = $requete->fetch();
    
    return $result;
    $requete->closeCursor();
    
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}
$mail_utilisateur = $_GET['mail'];
$datas=connexion2($bdd,$mail_utilisateur);

// $user=$_SESSION['mail_utilisateur'];

// echo(displayByUser($bdd,$id_utilisateur));
// print_r($mail_utilisateur);

$id_utilisateur = $datas['id_utilisateur'];
function avatar($bdd,$id_utilisateur){
    
  try {

    // Prepare the SQL statement
    $requete = $bdd->query("SELECT * FROM images INNER JOIN utilisateurs on images.id_utilisateur = utilisateurs.id_utilisateur WHERE images.id_utilisateur = $id_utilisateur");
    
    // Fetch the result
    $result = $requete->fetchAll();
    
    return $result;
    
    
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}

$image = avatar($bdd,$id_utilisateur);

$avatar = $datas['avatar_utilisateur'];
$pseudo = $datas['pseudo_utilisateur'];
$avatar = $datas['avatar_utilisateur'];
$pseudo = $datas['pseudo_utilisateur'];

include('../vue/userProfile.php');


?>