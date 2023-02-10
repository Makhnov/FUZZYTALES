<?php // <!-------------------------------- CONTROLEUR PRINCIPAL --------------------------------> //
    include('../model/connect.php'); // CONNEXION BDD
    include('../model/get.php'); // INTERACTION BDD GETTERS
    include('../model/set.php'); // INTERACTION BDD SETTERS
    include('../controller/accueil.php'); // FONCTIONS PAGE D'ACCUEIL
    include('../controller/functions.php'); // FONCTIONS GENERALES
    include('../vue/accueil.php'); // VISUEL PAGE D'ACCUEIL
    include('../vue/zoom.php'); // POP UP ZOOM
?>
