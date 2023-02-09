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
    <link rel="icon" type="image/x-icon" href="../../divers/img/favbook.ico">

</head>

<body onload="fuzziessssssss()">
    <header>
        <p>       
            <!-- ZONE AFFICHAGE PHP -->
        </p>
        <label for="readBook" id="menuBook"></label>
        <nav>
            <ul>
                <input type="checkbox" id="ul">
                <li class="upload"></li>
                <li class="profil"></li>
                <li class="album"></li>
            </ul>
        </nav>
    </header>

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
            <div class="page droite">
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
    ?>

    <footer></footer>
    <script src="../../js/book.js"></script>
    <?php
                promptImgAlgo()
    ?>
</body>

</html>