<?php
    if(isset($_GET['keyword'])) {
        include './api/pixabayAPI.php';
        echo "you searched for: " . $_GET['keyword'] . "<br/>";
        $imageURLs = getImageURLs($_GET['keyword']);
        // print_r($imageURLs);
        $backgroundImage = $imageURLs[array_rand($imageURLs)] . "<br/>";
    }
    else {
        $backgroundImage = "./img/sea.jpg";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image carousel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
       <style>
           @import url("./css/styles.css");
           
           body{
               background-image: url('<?=$backgroundImage ?>');
           }
       </style>
    </head>
    <body>
        <br/>
        <br/>
        
        
        <?php
            
            
            
            if(!isset($imageURLs)){
                echo "<h2>Type a keword tp display a slideshow <br/> with random images from pixelbay.com</h2>";
            } else {
                // for($i=0;$i<5;$i++){
                //    echo "<img src='" . $imageURLs[$i] . "' width=200";
                //}
            }
        ?>
        <!--<h1>Regular old html</h1>-->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol>
            <?php
                //this ends the else statement
                for($i=0;$i<5;$i++){
                   echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                   echo ($i == 0) ? "active" : "";
                   echo "></li>";
                }
            ?>
            </ol>
        </div>
        <div class="carousel-inner" role="listbox">
            <?php
                //this ends the else statement
                for($i=0;$i<5;$i++){
                    echo '<div class= "item';
                    echo ($i == 0) ? "active" : "";
                    echo '">';
                    echo '<img src="' .$imageURLs[$i] . '">';
                    echo "</div>";
                    
                }
            ?>
            <a class="left carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <form>
            <input type="text" name="keyword" placehoder="keyword">
            <input type="submit">
            
        </form>
        
        
        <br/>
        <br/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>