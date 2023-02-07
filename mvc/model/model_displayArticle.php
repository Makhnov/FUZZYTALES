<?php 
// include('../model/connect.php');
$response = $bdd->query('
    select images.id_image, images.url_image, tags.nom_tag
    from images
    inner join nommer
    on images.id_image = nommer.id_image
    inner join tags
    on nommer.id_tag = tags.id_tag
    group by tags.nom_tag
    having count(tags.id_tag)>4
    order by images.id_image
    limit 50;
');
$datas = [];

while($row = $response->fetch()){
    print_r($row);
    array_push($datas,$row['url_image']);
    array_push($datas,$row['nom_tag']);
}
?>