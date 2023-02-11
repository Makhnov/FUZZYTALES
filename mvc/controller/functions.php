<?php
    $newbie = true;
?>

<?php
inscritOrNot(){
    include ('../model/set.php');
    $connected = connexion($bdd,$mail_utilisateur,$mdp_utilisateur);
    if($connected==true){
        echo' <header>
        <nav>
            <ul>
                <input type="checkbox" id="ul">
                <li class="upload"></li>
                <li class="profil"></li>
                <li class="album"></li>
            </ul>
        </nav>
        </header>'
    }else{
        echo'<header>
        <nav><input type="submit">
        </nav></header>'
    }
}
?>