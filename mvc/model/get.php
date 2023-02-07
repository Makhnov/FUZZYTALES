<?php
// Afficher le nombre d'utilisateurs qui ont aimé une photo
function nbLikes($bdd,$id_utilisateur,$id_image){
    try{
        $requete = $bdd->prepare("SELECT count(:id_utilisateur) as 'Nombre de likes' from aimer where id_image=:id_image group by :id_image");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'id_image' => $id_image
        ));
        $requete->closeCursor();
        return $requete;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

// Afficher la liste des personnes qui ont aimé une photo
function listLikes($bdd,$id_utilisateur,$id_image){
    try{
        $requete = $bdd->prepare("SELECT :id_utilisateur as 'Liste des utilisateurs qui ont aimé' from aimer where id_image=:id_image");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'id_image' => $id_image
        ));
        $requete->closeCursor();
        return $requete;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

// Afficher le nombre de photos aimées par un utilisateur
function nbLikedPics($bdd,$id_utilisateur,$id_image){
    try{
        $requete = $bdd->prepare("SELECT count(:id_image) as 'Nombre de photos aimées' from aimer where id_utilisateur=:id_utilisateur group by :id_utilisateur");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'id_image' => $id_image
        ));
        $requete->closeCursor();
        return $requete;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

// Afficher le nombre d'abonnés d'un utilisateur (personnes qui le suivent)
function nbAbonnes($bdd,$id_utilisateur,$utilisateur_suiveur){
    try{
        $requete = $bdd->prepare("SELECT count(:utilisateur_suiveur) as 'Abonnés' from suivre where utilisateur_suivi=:id_utilisateur");
        $requete->execute(array(
            'utilisateur_suiveur' => $utilisateur_suiveur,
            'utilisateur_suivi' => $id_utilisateur
        ));
        $requete->closeCursor();
        return $requete;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

// Afficher la liste des abonnés d'un utilisateur (personnes qui le suivent)

// Afficher le nombre et la liste des abonnements d'un utilisateur (personnes qu'il suit)

// Recherche par pseudo, catégorie, album, tag
function search($bdd,$recherche){
    try{
        $requete = $bdd->prepare("SELECT :pseudo_utilisateur from utilisateurs where pseudo_utilisateur LIKE :recherche OR pseudo_utilisateur LIKE :recherche");
        $requete->execute(array(
            'recherche' => "%$recherche%"
        ));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}
?>