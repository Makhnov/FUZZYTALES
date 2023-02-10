<?php
// Connexion à la BDD
include('../model/connect.php');

// Affichage de la vue
include('../../connect.php');

//Test existence des champs
if(isset($_POST['pseudo_utilisateur']) && isset($_POST['mail_utilisateur']) && isset($_POST['mdp_utilisateur']) && isset($_POST['mdp_utilisateurVerif'])){

    //Test champs remplis
    if(!empty($_POST['pseudo_utilisateur']) && !empty($_POST['mail_utilisateur']) && !empty($_POST['mdp_utilisateur']) && !empty($_POST['mdp_utilisateurVerif'])){

        // Vérification mdp identiques
        if($_POST['mdp_utilisateur'] == $_POST['mdp_utilisateurVerif']){

            //Extraction des données
            extract($_POST);
            include('../model/set.php');
            ajoutUtilisateur($bdd,$pseudo_utilisateur,$mail_utilisateur,$mdp_utilisateur);
            //recharge la page et empeche la création de duplicata de données
            header('Location: controller_signUp.php');
        }else{
            echo 'Les mots de passe ne sont pas identiques.';
        }

    }else{
        echo 'Les données ne sont pas conformes.';

}
}
?>