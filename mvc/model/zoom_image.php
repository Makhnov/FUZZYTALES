<?php
    include('../model/connect.php'); // CONNEXION BDD
    include('../model/get.php'); // INTERACTION BDD GETTERS
    $id = $_POST['id'];
    $bdd = 'fuzzytales';
    $data = getUsersID($bdd, $id);
    echo json_encode($data);
?>
