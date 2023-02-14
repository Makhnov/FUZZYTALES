<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tornike.css">
    <link rel="stylesheet" href="../../css/tornike.css"/>
    <title>Document</title>
</head>

<body>
    <header></header>
    <section class="userProfile">
        <div class="user">
            <div class="userImg">
                <img src= "<?php print_r($datas)?>" alt=""> 
            </div>
            <div class="userName">
                <h3></h3>
            </div>
            <button class="followUser">
                follow
            </button>
            <div class="userDescription">
                <div class="followers">
                    <h5>Followers</h5>
                    <p>222</p>
                </div>
                <div class="following">
                    <h5>Following</h5>
                    <p>222</p>
                </div>
                <div class="numImages">
                    <h5>Posts</h5>
                    <p>222</p>
                </div>
            </div>
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
                            //convert tags of each image into string
                            $keys = ($datas[$i]['tags']); 
                            // split tags by ","
                            $tags = explode(",", $keys); 
                            // create <li> for each tag
                            foreach ($tags as $tag) {
                                //redirect 
                            $redirect = "http://localhost/fuzzytales/FUZZYTALES/mvc/controller/controller_bibliotheque.php?inputSearch=".$tag."&search=all";
                                //redirect
                            echo "<li>"; 
                            echo '<a href="'.$redirect.'">'. $tag ."</a>";
                            echo "</li>";
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
    <!-- image modal -->
    <div class="modal imgZoom">
        <div class="modalImage">
            <img src="divers/img/test2.jpg" alt="">
        </div>
        <div class="modalDesc">
            <div class="closeModal">
                <button><ion-icon name="close-outline"></ion-icon></button>
            </div>
            <div class="userDesc">
                <div class="profileImg">
                    <img src="divers/img/imgRFront.jpg" alt="">
                </div>
                <h2>Username</h2>
                <button class="followUser">follow</button>
            </div>
            <div class="imgDesc">
                <h3>img Title</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos nesciunt cupiditate amet voluptatem
                    corrupti ipsam maxime, blanditiis est alias ipsa dignissimos, eum fugit aut esse nulla, eveniet
                    recusandae officia repellat?</p>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
    <footer></footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/tornike.js"></script>
</body>

</html>