<?php 
// include('../model/connect.php');
$response = $bdd->query('
    select url_image, titre_image
    from images
    limit 14;
');
$datas = [];

while($row = $response->fetch()){
    array_push($datas,$row['url_image']);
    array_push($datas,$row['titre_image']);
}
?>