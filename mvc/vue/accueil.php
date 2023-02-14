<!DOCTYPE html>

<html lang="fr">

<head>
    <title>Fuzzy Tales</title>

    <meta name="author" content="Makh & co">
    <meta name="description" content="Page d'accueil">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/book.css">
    <link rel="stylesheet" href="../../css/accueil.css">
    <link rel="stylesheet" href="../../css/zoom.css">
    <link rel="icon" type="image/x-icon" href="../../divers/img/favbook.ico">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
        integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    
</head>

<body onload="fuzziessssssss()">
    <?php
        include('../vue/header.php'); // PIED DE PAGE
    ?>
    <section id="book">
        <input type="checkbox" id="readBook">
        <h1>FUZZY TALES</h1>
        <div id="livre">
            <div class="page gauche">
                <div class="slice sliceL">
                    <div class="slice sliceL">
                        <div class="slice sliceL">
                            <div class="slice sliceL">
                                <div class="slice sliceL">
                                    <div class="slice sliceL">
                                        <div class="slice sliceL"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page droite" id="pageMobile">
                <div class="slice sliceR">
                    <div class="slice sliceR">
                        <div class="slice sliceR">
                            <div class="slice sliceR">
                                <div class="slice sliceR">
                                    <div class="slice sliceR">
                                        <div class="slice sliceR"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fpage gauche"></div>
            <div class="fpage gauche"></div>
            <div class="fpage gauche"></div>
            <div id="pageGauche" class="fpage gauche"></div>
            <div class="fpage droite"></div>
            <div class="fpage droite"></div>
            <div class="fpage droite"></div>
            <div id="pageDroite" class="fpage droite"></div>
    </section>

    <?php
    include('../vue/newbie.php'); // INFORMATIONS NON INSCRITS
    include('../vue/notNewbie.php'); // INFORMATIONS INSCRITS 
    include('../vue/footer.php'); // PIED DE PAGE
    ?>
    <script src="../../js/book.js"></script>
    <script src="../../js/accueil.js"></script>
    
    <?php
        promptImgAlgo()
    ?>
</body>

</html>