<?php
//Connexion à la BDD fuzzyTales
$bdd = new PDO('mysql:host=localhost;dbname=fuzzyTales','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$bdd->exec("set names utf8");

function search($bdd, $url_image){

    try{
        $requete = $bdd->query("SELECT url_image from images");
        $requete = $requete->fetchAll();
        $img = $requete;
        $before = ["200" , "300"];
        $i = 0;
        $tab = [];

        foreach ($img as $image) {
            $width = (250 + ($i * 2));
            $height = (375 + ($i * 3));

            $after = [];
            $after = ["$width", "$height"];

            $image = str_replace($before, $after,  $image[0]);
            array_push($tab, $image);

            if ($i < 500) {
                $i++;
            } else {
                $i = 0;
            }
        }

        return $tab;


    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }


}

function editImage($bdd,$id_image,$url_image){
    try{
        $requete = $bdd->prepare("UPDATE images set url_image=:url_image WHERE id_image=:id_image");
        $requete->execute(array(
            'id_image' => $id_image,
            'url_image' => $url_image
        ));
        $requete->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

$tableau = search($bdd, 'url_image');

for ($i = 1; $i < (count($tableau) + 1); $i++ ) {
    editImage($bdd, $i, $tableau[$i - 1]);
}

?>