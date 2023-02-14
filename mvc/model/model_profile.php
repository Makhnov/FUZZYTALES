<?php 
//avatar utilisateur
function display_User($bdd){
    $datas = [];
    try{
        $requete = $bdd->prepare("SELECT avatar_utilisateur from utilisateurs where mail_utilisateur =:mail_utilisateur");
        $requete->execute(array(
            'mail_utilisateur' => $_SESSION['mail_utilisateur']
        ));
        while($row = $requete->fetch(PDO::FETCH_NAMED)){
            array_push($datas,$row);
        } 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    return $datas;
}
display_User($bdd);
?>