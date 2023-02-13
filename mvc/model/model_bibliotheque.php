<?php 
// include('../model/connect.php');
//$datas = [];
//$count = "";
function displayTagOnImage($bdd){
    $datas = [];
    //$count = "";
    $response = $bdd->query('
    SELECT count(images.id_image), images.url_image, GROUP_CONCAT(tags.nom_tag) as tags
    FROM images
    JOIN nommer ON images.id_image = nommer.id_image
    JOIN tags ON nommer.id_tag = tags.id_tag
    GROUP BY images.id_image
    limit 15;
    ');
    //global $count;
    //global $datas;
    while($row = $response->fetch(PDO::FETCH_NAMED)){
        // print_r($row);
        // array_push($datas,$row['url_image']);
        // array_push($datas,$row['tag_name']);
        array_push($datas,$row);
        $count = $response->rowCount();
    }
    return $datas;
}
// $datas = displayTagOnImage($bdd);


// displayTagOnImage($bdd);
function displayTagOnImage1($bdd){
    $response = $bdd->query('
    SELECT count(images.id_image), images.url_image, GROUP_CONCAT(tags.nom_tag) as tags
    FROM images
    JOIN nommer ON images.id_image = nommer.id_image
    JOIN tags ON nommer.id_tag = tags.id_tag
    GROUP BY images.id_image
    limit 5 offset 5;
    ');
    global $count;
    global $datas;
    while($row = $response->fetch(PDO::FETCH_NAMED)){
        // print_r($row);
        // array_push($datas,$row['url_image']);
        // array_push($datas,$row['tag_name']);
        array_push($datas,$row);
        $count = $response->rowCount();
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
function displayByTag($bdd,$select2){
    $datas = [];
    try{
        $requete = $bdd->prepare(" 
        SELECT images.url_image, GROUP_CONCAT(tags.nom_tag) as tags
        FROM images
        JOIN nommer ON images.id_image = nommer.id_image
        JOIN tags ON nommer.id_tag = tags.id_tag
        GROUP BY images.id_image
        HAVING tags LIKE :text
        ");
        $requete->execute(array(
            'text' => "%$select2%"
        ));
        while($row = $requete->fetch(PDO::FETCH_NAMED)){
            // print_r($row);
            // array_push($datas,$row['url_image']);
            // array_push($datas,$row['tag_name']);
            array_push($datas,$row);
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    return $datas;
}
//searchByTag($bdd,'mignon');

// Affichage des images par catégorie
function displayByCategory($bdd,$select1){
    $datas = [];
    try{
        $requete = $bdd->prepare("SELECT images.url_image, group_concat(tags.nom_tag) as tags, categories.nom_categorie
        FROM nommer
        INNER JOIN tags
        ON nommer.id_tag = tags.id_tag
        INNER JOIN images
        on images.id_image = nommer.id_image
        INNER JOIN appartenir 
        on appartenir.id_image = images.id_image
        INNER JOIN categories
        on appartenir.id_categorie = categories.id_categorie
        GROUP BY nommer.id_image");
        $requete->execute(array(

        ));
        while($row = $requete->fetch(PDO::FETCH_NAMED)){
            // print_r($row);
            // array_push($datas,$row['url_image']);
            // array_push($datas,$row['tag_name']);
            if($row['nom_categorie'] == $select1){
                array_push($datas,$row);
            }
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    return $datas;
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



//search images if tag or title contains user input
function displayAllBySearch($bdd,$select2){
        $datas = [];
        try{
        $requete = $bdd->prepare("SELECT images.url_image, GROUP_CONCAT(tags.nom_tag) as tags, images.titre_image
        FROM images
        JOIN nommer ON images.id_image = nommer.id_image
        JOIN tags ON nommer.id_tag = tags.id_tag
        GROUP BY images.id_image
        HAVING tags LIKE :input or images.titre_image like :input");
        $requete->execute(array(
            'input' => "%$select2%"
        ));
        while($row = $requete->fetch(PDO::FETCH_NAMED)){
            // print_r($row);
            // array_push($datas,$row['url_image']);
            // array_push($datas,$row['tag_name']);
            array_push($datas,$row);
        }
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    return $datas;
}

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