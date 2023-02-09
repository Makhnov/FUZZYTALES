<?php


// //Connexion à la BDD fuzzyTales
// $bdd = new PDO('mysql:host=localhost;dbname=fuzzyTales','root','',
// array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// $bdd->exec("set names utf8");

// Afficher le nombre d'utilisateurs qui ont aimé une photo
function nbLikes($bdd, $id_utilisateur, $id_image)
{
    try {
        $requete = $bdd->prepare("SELECT count(:id_utilisateur) as 'Nombre de likes' from aimer where id_image=:id_image group by :id_image");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'id_image' => $id_image
        ));
        $requete->closeCursor();
        return $requete;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// Afficher la liste des personnes qui ont aimé une photo
function listLikes($bdd, $id_utilisateur, $id_image)
{
    try {
        $requete = $bdd->prepare("SELECT :id_utilisateur as 'Liste des utilisateurs qui ont aimé' from aimer where id_image=:id_image");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'id_image' => $id_image
        ));
        $requete->closeCursor();
        return $requete;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// Afficher le nombre de photos aimées par un utilisateur
function nbLikedPics($bdd, $id_utilisateur, $id_image)
{
    try {
        $requete = $bdd->prepare("SELECT count(:id_image) as 'Nombre de photos aimées' from aimer where id_utilisateur=:id_utilisateur group by :id_utilisateur");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'id_image' => $id_image
        ));
        $requete->closeCursor();
        return $requete;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// Afficher le nombre d'abonnés d'un utilisateur (personnes qui le suivent)
function nbAbonnes($bdd, $id_utilisateur, $utilisateur_suiveur)
{
    try {
        $requete = $bdd->prepare("SELECT count(:utilisateur_suiveur) as 'Abonnés' from suivre where utilisateur_suivi=:id_utilisateur");
        $requete->execute(array(
            'utilisateur_suiveur' => $utilisateur_suiveur,
            'utilisateur_suivi' => $id_utilisateur
        ));
        $requete->closeCursor();
        return $requete;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// Afficher la liste des abonnés d'un utilisateur (personnes qui le suivent)

// Afficher le nombre et la liste des abonnements d'un utilisateur (personnes qu'il suit)

// Recherche par pseudo, catégorie, album, tag
function search($bdd, $recherche)
{
    try {
        $requete = $bdd->prepare("SELECT :pseudo_utilisateur from utilisateurs where pseudo_utilisateur LIKE :recherche OR pseudo_utilisateur LIKE :recherche");
        $requete->execute(array(
            'recherche' => "%$recherche%"
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}






// SELECTS GENERAUX //

// IMAGES //

function getImgAlgo($bdd)
{
    try {
        $PDO = connectNico($bdd, 'root', '', true); // On se connecte à la BDD (plus d'infos : mvc/model/connect.php). 
        $data = $PDO->query("SELECT images.id_image, url_image, COUNT(aimer.id_image) AS 'Likes' from images INNER JOIN aimer ON images.id_image = aimer.id_image GROUP BY images.id_image ORDER BY COUNT(aimer.id_image) DESC");
        $data = $data->fetchAll();

        return $data;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// *** //

?>

<?php // CODE NICO //

// RECUPERATION DES DONNES D'UNE TABLE SPECIFIQUE //
function getNico($bdd, $table)
{
    try {
        $PDO = connect($bdd, 'root', '', true); // On se connecte à la BDD (plus d'infos : mvc/model/connect.php). 
        $data = $PDO->query("SELECT * FROM `$table`"); // On lance une requête pour sélectionner tous les éléments d'une table donnée.
        $data = $data->fetchAll(); // On récupère la totalité de ces éléments sous la forme d'un tableau associatif.
        return $data; // On renvoit ce tableau et on termine la connexion.
    }

    // ON RECUPERE LES EXCEPTIONS LEVEES DANS LE TRY // 
    // Dans notre instance les erreurs sont considérées comme des exceptions (cf. mvc/model/connect.php lignes 12-13 ).
    catch (Exception $exc) {
        return $exc->getMessage(); // On renvoit le message d'erreur.
        die(); // On arrête l'exécution php directement après avoir envoyé le message d'erreur (mode 'développement').
    }
}
?>


