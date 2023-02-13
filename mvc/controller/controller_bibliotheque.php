
<?php 
include('../model/connect.php');
include('../model/model_bibliotheque.php');

// if (isset($_POST["inputSearch"],$_POST["search"]) && $_POST["search"] == "Animaux") {
//     $datas = displayTagOnImage($bdd);
// } else {    
//     echo "N0, mail is not set";
// }

if(isset($_GET['search']) && !empty($_GET['search'])){
    $select1 = $_GET['search'];
    switch ($select1) {
        //animaux
        case 'all':
            if (isset($_GET['inputSearch'])){
                $select2 = $_GET['inputSearch'];
                $datas = displayAllBySearch($bdd,$select2);
            }
        break;
        case 'animaux':
            $datas = displayByCategory($bdd,$select1);
        break;
        //sport
        case 'sport':
            $datas = displayByCategory($bdd,$select1);
        break;
        //montagne
        case 'montagne':
            $datas = displayByCategory($bdd,$select1);
        break;
        //ocean
        case 'ocean':
            $datas = displayByCategory($bdd,$select1);
        break;
        //nature
        case 'nature':
            $datas = displayByCategory($bdd,$select1);
        break;
        //loisir
        case 'loisir':
            $datas = displayByCategory($bdd,$select1);
        break;
        //mode
        case 'mode':
            $datas = displayByCategory($bdd,$select1);
        break;
        //interieur
        case 'interieur':
            $datas = displayByCategory($bdd,$select1);
        break;
        //nourriture
        case 'nourriture':
            $datas = displayByCategory($bdd,$select1);
        break;
        //soiree
        case 'soiree':
            $datas = displayByCategory($bdd,$select1);
        break;
        //fetes
        case 'fetes':
            $datas = displayByCategory($bdd,$select1);
        break;
        //autre
        case 'autre':
            $datas = displayByCategory($bdd,$select1);
        break;
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


// <option selected="selected">Recherche</option>
// <option value="tag">#tag</option>
// <option value="user">@user</option>
// <option disabled>-Categories-</option>
// <option value="animaux">Animaux</option>
// <option value="sport">Sport</option>
// <option value="montagne">Montagne</option>
// <option value="ocean">Ocean</option>
// <option value="nature">Nature</option>
// <option value="loisir">Loisir</option>
// <option value="mode">Mode</option>
// <option value="interieur">Interieur</option>
// <option value="nourriture">Nourriture</option>
// <option value="soiree">Soirée</option>
// <option value="fetes">Fetes</option>
// <option value="autre">Autre</option>
include_once('../vue/vue_bibliotheque.php');
include('debugImage.php');

?>

