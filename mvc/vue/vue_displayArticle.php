<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tornike.css">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "<section class="."gallerySect".">";
        echo "<div class="."gallery".">";
        $i=0;
        while(isset($datas[$i+1])){
                echo "<div class="."card".">";
                    echo "<div class="."cardContent".">";
                        echo "<img src=".$datas[$i].">";
                        echo "<div class="."tags".">";
                            echo "<ul>";
                                echo "<li><a href=".">".$datas[$i+1]."</a></li>";
                                echo "<li><a href=".">".$datas[$i+1]."</a></li>";
                                echo "<li><a href=".">".$datas[$i+1]."</a></li>";
                                echo "<li><a href=".">".$datas[$i+1]."</a></li>";
                                echo "<li><a href=".">".$datas[$i+1]."</a></li>";
                            echo "</ul>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            $i+=2;
        }
        echo "</div>";
        echo "</section>";
        ?>
        <script src="js.js"></script>
</body>
</html>
