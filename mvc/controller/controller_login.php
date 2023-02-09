<?php
// Connexion à la BDD
include('FUZZYTALES\mvc\model\connect.php');

//Test existence des champs
if(isset($_POST['mail_utilisateur']) && isset($_POST['mdp_utilisateur'])){

    //Test champs remplis
    if(!empty($_POST['mail_utilisateur']) && !empty($_POST['mdp_utilisateur'])){

    }
}
?>