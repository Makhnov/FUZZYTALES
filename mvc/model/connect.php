<?php
//Connexion à la BDD fuzzyTales
$bdd = new PDO('mysql:host=localhost;dbname=fuzzyTales','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$bdd->exec("set names utf8");
?>

<?php // CODE NICO <!-------------------------------- CONNEXIONS BDD --------------------------------> //
    // ON CREE UNE INSTANCE PDO (via une invocation de pilote) // 
    function connectNico($dsn, $user, $pass, $bool) {

        $dsn = 'mysql:host=localhost;dbname='.$dsn; // On définit le DSN et le nom de notre base de données (en argument).
        // $user (ici root) est le nom d'utisateur nécessaire pour administrer la BDD.
        // $pass (ici '') est le password associé à l'utilisateur (ci-dessus).

        if ($bool) {
            $err = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); 
            // Grace à cette équivalence, dans notre PDO les erreurs seront traitées comme des exceptions.
        } else {
            $err = array();
        }

        $PDO = new PDO($dsn, $user, $pass, $err); // On active l'instance PDO qui nous permettra de communiquer avec la BDD.

        $PDO->exec("set names utf8"); // On définit l'encodag en UTF8.

        return $PDO; // On renvoit l'objet pour le réutiliser par la suite lors des requêtes (mvc/model/datas.php).
    }
?>