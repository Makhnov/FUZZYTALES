<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tornike.css">
    <title>Bibliotheque</title>
</head>
<body>
    <header></header>
    <section class="search">
        <div class="matches">
            <h3><strong><?php echo $count ?> results</strong></h3>
        </div>
        <div class="searchBar">
            <form action="" method="get" id="search">
                <input type="text" id="search" name="search" placeholder="Search">
                <select id="cars" name="search">
                    <option selected="selected">Recherche</option>
                    <option value="tag">#tag</option>
                    <option value="user">@user</option>
                    <option disabled>-Categories-</option>
                    <option value="animaux">Animaux</option>
                    <option value="sport">Sport</option>
                    <option value="montagne">Montagne</option>
                    <option value="ocean">Ocean</option>
                    <option value="nature">Nature</option>
                    <option value="loisir">Loisir</option>
                    <option value="mode">Mode</option>
                    <option value="interieur">Interieur</option>
                    <option value="nourriture">Nourriture</option>
                    <option value="soirée">Soirée</option>
                    <option value="fetes">Fetes</option>
                    <option value="autre">Autre</option>
                </select>
                <button type="submit" form="search" value="Submit"><ion-icon name="search-outline"></ion-icon></button>
            </form>
        </div>
        <div class="sortItems">
            <select id="pet-select">
                <option value="">Plus récentes</option>
                <option value="">Plus anciennes</option>
            </select>
        </div>
    </section>
    <?php 
        echo "<section class="."gallerySect".">";
        echo "<div class="."gallery".">";
        $i=0;
        while(isset($datas[$i])){
                echo "<div class="."card".">";
                    echo "<div class="."cardContent".">";
                        echo "<img src=".$datas[$i]['url_image'].">";
                        echo "<div class="."tags".">";
                            echo "<ul>";
                            $keys = ($datas[$i]['tags']); //convert tags of each image into string
                            $tags = explode(",", $keys); // split tags by ","
                            foreach ($tags as $tag) {
                            echo "<li>". "<a href=".$tag.">" . $tag . "</a>" . "</li>"; // create <li> for each tag
                            }
                            echo "</ul>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class="."ionic".">";
                        echo "<ion-icon name="."thumbs-up-outline"."></ion-icon>";
                        echo "<ion-icon name="."bookmark-outline"."></ion-icon>";
                        echo "<ion-icon name="."cloud-download-outline"."></ion-icon>";
                    echo "</div>";
                echo "</div>";
            $i+=1;
        }
        echo "</div>";
        echo "</section>";
        ?>
        <script src="../../js/tornike.js"></script>

    <footer></footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/tornike.js"></script>
</body>
</html>