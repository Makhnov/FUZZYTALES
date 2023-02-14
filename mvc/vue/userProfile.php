<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/tornike.css"> -->
    <link rel="stylesheet" href="../../css/tornike.css"/>
    <title>Document</title>
</head>

<body>
    <header></header>
    <section class="userProfile">
        <div class="user">
            <div class="userImg">
                <!-- <img src= "" alt="">  -->
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

        <section class="gallerySect">
        <div class="gallery">
            <div class="card upload">
                <div class="cardContent" data-modal-target="#upload-image">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </div>
            </div>

        <?php 
        $i=0;
        //while(isset($datas[$i])){
                echo "<div class="."card".">";
                    echo "<div class="."cardContent".">";
                        //echo "<img src=".$datas[$i]['url_image'].">";
                        echo "<div class="."tags".">";
                            echo "<ul>";
                            //convert tags of each image into string
                            //$keys = ($datas[$i]['tags']); 
                            // split tags by ","
                            //$tags = explode(",", $keys); 
                            // create <li> for each tag
                            //foreach ($tags as $tag) {
                            echo "<li>"; 

                            echo "</li>";
                            //}
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
        // }
        ?>
        </div>
        </section>


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
    <!-- upload image modal -->
    <div class="modal userAcc upload" id="upload-image">
        <span data-close-button class="close-button">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="logIn">
            <form action="controller_profile.php" method="post">
                <input type="text" id="titreImg" name="titre_image" placeholder="Titre" required>
                <textarea id="descImg" name="description_image"
                rows="5" cols="35" placeholder="Description"></textarea>
                <input type="text" id="userImg" name="url_image" placeholder="Img Link">
                <button type="submit" id="signUp">Submit</button>
            </form>
        </div>
    </div>
    <footer></footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../js/tornike.js"></script>
</body>

</html>