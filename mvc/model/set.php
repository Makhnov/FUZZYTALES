<?php
// // Ajouts
//Inscription d'un utilisateur
function ajoutUtilisateur($bdd, $pseudo_utilisateur, $mail_utilisateur, $mdp_utilisateur)
{
    try {
        $requete = $bdd->prepare("INSERT INTO utilisateurs(pseudo_utilisateur,mail_utilisateur,mdp_utilisateur) VALUES (:pseudo_utilisateur, :mail_utilisateur, :mdp_utilisateur)");
        $requete->execute(array(
            'pseudo_utilisateur' => $pseudo_utilisateur,
            'mail_utilisateur' => $mail_utilisateur,
            'mdp_utilisateur' => $mdp_utilisateur
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Ajout d'une nouvelle catégorie
function ajoutCategorie($bdd, $nom_categorie)
{
    try {
        $requete = $bdd->prepare("INSERT INTO categories(nom_categorie) VALUES (:nom_categorie)");
        $requete->execute(array(
            'nom_categorie' => $nom_categorie
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Upload une photo

function ajoutImage($bdd,$titre_image,$url_image,$date_image,$description_image,$id_utilisateur){
    try{
        $requete = $bdd->prepare("INSERT INTO images(titre_image, url_image, date_image, description_image, id_utilisateur) VALUES (:titre_image, :url_image, :date_image, :description_image, :id_utilisateur)");

        $requete->execute(array(
            'titre_image' => $titre_image,
            'url_image' => $url_image,
            'date_image' => $date_image,
            'description_image' => $description_image,
            'id_utilisateur' => $id_utilisateur
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Créer un album

function ajoutAlbum($bdd,$titre_album,$date_album,$description_album,$id_utilisateur,$id_statut){
    try{

        $requete = $bdd->prepare("INSERT INTO albums(titre_album, date_album, description_album, id_utilisateur, id_statut) VALUES (:titre_album, :date_album, :description_album, :id_utilisateur, :id_statut)");
        $requete->execute(array(
            'titre_album' => $titre_album,
            'date_album' => $date_album,
            'description_album' => $description_album,
            'id_utilisateur' => $id_utilisateur,
            'id_statut' => $id_statut
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Liker une image
function ajoutLike($bdd,$id_image,$id_utilisateur){
    try{

        $requete = $bdd->prepare("INSERT INTO aimer(id_image,id_utilisateur) VALUES (:id_image, :id_utilisateur)");
        $requete->execute(array(
            'id_image' => $id_image,
            'id_utilisateur' => $id_utilisateur
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Suivre un utilisateur
function ajoutFollow($bdd,$utilisateur_suivi,$utilisateur_suiveur){
    try{
        $requete = $bdd->prepare("INSERT INTO suivre(utilisateur_suivi,utilisateur_suiveur) VALUES (:utilisateur_suivi, :utilisateur_suiveur)");
        $requete->execute(array(
            'utilisateur_suivi' => $utilisateur_suivi,
            'utilisateur_suiveur' => $utilisateur_suiveur
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// // Mises à jour
//Modifier le nom d'une catégorie (admin)
function editCategorie($bdd,$nom_categorie,$id_categorie){
    try{
        $requete = $bdd->prepare("UPDATE categories set nom_categorie=:nom_categorie WHERE id_categorie=:id_categorie");
        $requete->execute(array(
            'id_categorie' => $id_categorie,
            'nom_categorie' => $nom_categorie
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Modifier le nom d'un album
function editAlbum($bdd,$titre_album,$id_album){
    try{
        $requete = $bdd->prepare("UPDATE albums set titre_album=:titre_album WHERE id_album=:id_album");
        $requete->execute(array(
            'id_album' => $id_album,
            'titre_album' => $titre_album
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Modifier les infos du compte
function editUser($bdd,$id_utilisateur,$pseudo_utilisateur,$mail_utilisateur,$mdp_utilisateur){
    try{
        $requete = $bdd->prepare("UPDATE utilisateurs set pseudo_utilisateur=:pseudo_utilisateur, mail_utilisateur=:mail_utilisateur, mdp_utilisateur=:mdp_utilisateur where id_utilisateur=:id_utilisateur");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'pseudo_utilisateur' => $pseudo_utilisateur,
            'mail_utilisateur' => $mail_utilisateur,
            'mdp_utilisateur' => $mdp_utilisateur
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Modifier le rôle d'un utilisateur (admin)
function editRole($bdd,$id_utilisateur,$id_role){
    try{
        $requete = $bdd->prepare("UPDATE utilisateurs set id_role=:id_role where id_utilisateur=:id_utilisateur");
        $requete->execute(array(
            'id_role' => $id_role,
            'id_utilisateur' => $id_utilisateur
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// // Suppressions
//Supprimer une image
function suppressionImage($bdd, $id_image)
{
    try {
        $requete = $bdd->prepare("DELETE FROM images where exists (SELECT * images where id_image=:id_image) AND id_image=:id_image");
        $requete->execute(array(
            'id_image' => $id_image
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Supprimer un album
function suppressionAlbum($bdd, $id_album)
{
    try {
        $requete = $bdd->prepare("DELETE FROM albums where exists (SELECT * albums where id_album=:id_album) AND id_album=:id_album");
        $requete->execute(array(
            'id_album' => $id_album
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Supprimer une catégorie (admin)
function suppressionCategorie($bdd, $id_categorie, $nom_categorie)
{
    try {
        $requete = $bdd->prepare("DELETE FROM categories WHERE EXISTS (SELECT * from categories WHERE id_categorie=:id_categorie) AND nom_categorie=:nom_categorie");
        $requete->execute(array(
            'nom_categorie' => $nom_categorie,
            'id_categorie' => $id_categorie
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//Supprimer un utilisateur
function suppressionCompte($bdd, $id_utilisateur)
{
    try {
        $requete = $bdd->prepare("DELETE FROM utilisateurs WHERE EXISTS (SELECT * from utilisateurs WHERE id_utilisateur=:id_utilisateur) AND id_utilisateur=:id_utilisateur");
        $requete->execute(array(
            'id_utilisateur' => $id_utilisateur
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
// ajouter image dans un album
function rangerImage($bdd, $id_image, $id_album)
{
    try {
        $requete = $bdd->prepare("INSERT INTO remplir (id_image,id_album)VALUES(:id_image,:id_album");
        $requete->execute(array(
            'id_image' => $id_image,
            'id_album' => $id_album
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>