
 <!DOCTYPE html>
<?php
        $gryff = $_POST["gryff"];
        $slyth = $_POST["slyth"];
        $rave = $_POST["rave"];
        $huff = $_POST["huff"];
        $mugg = $_POST["mugg"];

        $max = max($gryff, $slyth, $rave, $huff, $mugg);

        if($max == $gryff){
                $house = "Gryffindor";
                $img = "images/gryffindor.png";
        }
        if($max == $slyth){
                $house = "Slytherin";
                $img = "images/slytherin.png";
        }
        if($max == $rave){
                $house = "Ravenclaw";
                $img = "images/ravenclaw.png";
        }
        if($max == $huff){
                $house = "Hufflepuff";
                $img = "images/hufflepuff.png";
        }
        if($max == $mugg){
                $house = "Muggle Life";
                $img = "images/muggle.png";
        }
?>
<html lang="en">
<head>
        <meta charset="utf-8"/>
                <title>Virtual Sorting Hat</title>
                <link rel="stylesheet" type="text/css" href="css/main.css"/>
        </head>

        <body>
                <header>
                        <p>Virtual Sorting Hat<p>       
                </header>
                <div class="main">
                         <?php echo "<img id='house_crest' src=" . $img . ">" ?>

                        <?php echo "<h4 id ='house'>Welcome to " . $house . "!</h4>" ?>

                        <?php echo "<p id='results'>You got " . $gryff . " points for Gryffindor, ". $slyth . " points for Slytherin, " . $rave . " points for Ravenclaw, " . $huff . " points for Hufflepuff and " . $mugg . " points for Muggle!" ?>

                        <a href="houses.php">See who else got sorted &#62;</a>
                </div>
                <script type="text/javascript" src="js/results.js"></script>
                <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>  
        </body>
</html>
