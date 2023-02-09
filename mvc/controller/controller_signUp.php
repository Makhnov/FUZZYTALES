<?php
// Connexion à la BDD
include('FUZZYTALES\mvc\model\connect.php');

//Test existence des champs
if(isset($_POST['pseudo_utilisateur']) && isset($_POST['mail_utilisateur']) && isset($_POST['mdp_utilisateur']) && isset($_POST['mdp_utilisateurVerif'])){

    //Test champs remplis
    if(!empty($_POST['pseudo_utilisateur']) && !empty($_POST['mail_utilisateur']) && !empty($_POST['mdp_utilisateur']) && !empty($_POST['mdp_utilisateurVerif'])){

        // Vérification mdp identiques
        if($_POST['mdp_utilisateur'] == $_POST['mdp_utilisateurVerif']){

            //Extraction des données
            extract($_POST);
            ajoutUtilisateur($bdd,$pseudo_utilisateur,$mail_utilisateur,$mdp_utilisateur);
        }else{
            echo 'Les mots de passe ne sont pas identiques.';
        }
        
    }

}else{
    echo 'Les données ne sont pas conformes.';
}
?>