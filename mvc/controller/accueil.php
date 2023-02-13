<?php
    function promptImgAlgo() {
        $bdd = 'fuzzytales';
        $data = getImgAlgo($bdd);
                
        ?>
            <script> // On lance un script pour afficher les images dans le DOM en JS.
                let data = <?php echo json_encode($data);?>; // Les données sont transmises de PHP à JS (variable 'data').
                PHPtoJS(data, 'affichageImageLivre'); // On lance la fonction qui affiche les données recueillies.
            </script>
        <?php
    }
?>