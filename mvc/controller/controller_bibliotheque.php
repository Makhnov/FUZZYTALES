
<?php 
include('../model/connect.php');
include('../model/model_bibliotheque.php');


if(isset($_GET['search']) && !empty($_GET['search'])){
    $select1 = $_GET['search'];
    switch ($select1) {
        //rechercher par titre ou tag d'image
        case 'all':
            if (isset($_GET['inputSearch'])){
                $select2 = $_GET['inputSearch'];
                $datas = displayAllBySearch($bdd,$select2);
            }
        break;
        //rechercher par catégorie
        case 'animaux':
        case 'sport':
        case 'montagne':
        case 'ocean':
        case 'nature':
        case 'loisir':
        case 'mode':
        case 'interieur':
        case 'nourriture':
        case 'soiree':
        case 'fetes':
        case 'autre':
            $datas = displayByCategory($bdd,$select1);
        break;
        //rechercher par tag
        case 'tag':
            if (isset($_GET['inputSearch'])){
                $select2 = $_GET['inputSearch'];
                $datas = displayByTag($bdd,$select2);
            }
        break;
        default:
            //
        break;
    }
} else {
    $datas = displayTagOnImage($bdd);
}

include_once('../vue/vue_bibliotheque.php');
include('debugImage.php');

?>

