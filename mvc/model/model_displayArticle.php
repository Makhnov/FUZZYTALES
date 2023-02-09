<?php 
// include('../model/connect.php');
function displayTagOnImage($bdd){
    $response = $bdd->query('
        SELECT images.id_image, images.url_image, tags.nom_tag AS tag_name
        FROM images
        JOIN nommer ON images.id_image = nommer.id_image
        JOIN tags ON nommer.id_tag = tags.id_tag
    ');
    $datas = [];

    while($row = $response->fetch()){
        print_r($row);
        array_push($datas,$row['url_image']);
        array_push($datas,$row['nom_tag']);
    }
}

// Affichage de toutes les images 
function displayAll($bdd){
    try{
        $requete = $bdd->prepare("SELECT * from images");
        $requete->execute(array());
        while($datas = $requete->fetch()){
            echo '<img src='.$datas['url_image'].'>';
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

// Affichage des images par utilisateur
function displayByUser($bdd,$id_utilisateur){
    try{
        $requete = $bdd->prepare("SELECT * from images where id_utilisateur=:id_utilisateur");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur
        ));
        while($datas = $requete->fetch()){
            echo '<img src='.$datas['url_image'].'>';
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

// Affichage des images par tag
function displayByTag($bdd,$nom_tag){
    try{
        $requete = $bdd->prepare("SELECT * from images inner join nommer on images.id_image=nommer.id_image inner join tags on nommer.id_tag=tags.id_tag where tags.nom_tag=:nom_tag");
        $requete->execute(array(
            'nom_tag' => $nom_tag
        ));
        while($datas = $requete->fetch()){
            echo '<img src='.$datas['url_image'].'>';
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}
//searchByTag($bdd,'mignon');

// Affichage des images par catégorie
function displayByCategory($bdd,$nom_categorie){
    try{
        $requete = $bdd->prepare("SELECT * from images inner join appartenir on images.id_image=appartenir.id_image inner join categories on appartenir.id_categorie=categories.id_categorie where categories.nom_categorie=:nom_categorie");
        $requete->execute(array(
            'nom_categorie' => $nom_categorie
        ));
        while($datas = $requete->fetch()){
            echo '<img src='.$datas['url_image'].'>';
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}
//searchByCategory($bdd,'autre');

// Affichage des images par utilisateur
function displayUserImagesByName($bdd,$pseudo_utilisateur){
    try{
        $requete = $bdd->prepare("SELECT * from images inner join utilisateurs on images.id_utilisateur=utilisateurs.id_utilisateur where utilisateurs.pseudo_utilisateur=:pseudo_utilisateur");
        $requete->execute(array(
            'pseudo_utilisateur' => $pseudo_utilisateur
        ));
        while($datas = $requete->fetch()){
            echo '<img src='.$datas['url_image'].'>';
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}
//displayUserImagesByName($bdd,'Brian');


// PAS FINIIIIIIIII

// Affichage images par catégorie et utilisateur
// function displayByCategoryAndUser($bdd,$nom_categorie,$pseudo_utilisateur){
//     try{
//         $requete = $bdd->prepare("SELECT images.url_image,utilisateurs.pseudo_utilisateur from utilisateurs
//         join images on utilisateurs.id_utilisateur=images.id_utilisateur
//         join appartenir on images.id_image=appartenir.id_image
//         join categories on appartenir.id_categorie=categories.id_categorie
//         where categories.nom_categorie=:nom_categorie AND utilisateurs.pseudo_utilisateur=:pseudo_utilisateur");
//         $requete->execute(array(
//             'nom_categorie' => $nom_categorie,
//             'pseudo_utilisateur' => $pseudo_utilisateur
//         ));
//         while($datas = $requete->fetchAll()){
//             echo '<img src='.$datas['url_image'].'>';
//             echo '<p>'.$datas['pseudo_utilisateur'].'</p>';
//         }
//     } catch (Exception $e) {
//         die('Erreur : ' . $e->getMessage());
//     }
// }
// displayByCategoryAndUser($bdd,'animaux','Brian');
?>