<?php
// Connexion à la BDD
include('../model/connect.php');
include('../../connect.php');
include('../model/set.php');
//Test existence des champs
if(isset($_POST['mail_utilisateur']) && isset($_POST['mdp_utilisateur'])){

    //Test champs remplis
    if(!empty($_POST['mail_utilisateur']) && !empty($_POST['mdp_utilisateur'])){
        extract($_POST);
    connexion($bdd,$mail_utilisateur,$mdp_utilisateur);
    }
}
?>