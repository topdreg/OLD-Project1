
 <!DOCTYPE html>
<?php
if(isset($_POST['results'])){
        //error_reporting(E_ALL);
        //ini_set('display_errors', '1');
        
        include('appData.txt');
        
        try 
        { 
         $dbh = new PDO('mysql:host='.$server.';port='.$port.';dbname='.$dbname, $user, $pass);
        } catch (PDOException $e) {
         print $e->getMessage();
         exit;
        } 
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $profPic = $_POST["profPic"];
        $gryff = $_POST["gryff"];
        $slyth = $_POST["slyth"];
        $rave = $_POST["rave"];
        $huff = $_POST["huff"];
        $mugg = $_POST["mugg"];


        $max = max($gryff, $slyth, $rave, $huff, $mugg);

        if($max == $gryff){
                $house = "Gryffindor";
                $housePHP = "g";
                $img = "images/gryffindor.png";
        }
        if($max == $slyth){
                $house = "Slytherin";
                $housePHP = "s";
                $img = "images/slytherin.png";
        }
        if($max == $rave){
                $house = "Ravenclaw";
                $housePHP = "r";
                $img = "images/ravenclaw.png";
        }
        if($max == $huff){
                $house = "Hufflepuff";
                $housePHP = "h";
                $img = "images/hufflepuff.png";
        }
        if($max == $mugg){
                $house = "Muggle Life";
                $housePHP = "m";
                $img = "images/muggle.png";
        }
        
        $query = "INSERT INTO player VALUES(?,?,?,?,?,?,?,?,?)";

        $stmt = $dbh->prepare($query);

        $stmt->bindParam(1, $fname);
        $stmt->bindParam(2, $lname);
        $stmt->bindParam(3, $profPic);
        $stmt->bindParam(4, $gryff);
        $stmt->bindParam(5, $slyth);
        $stmt->bindParam(6, $rave);
        $stmt->bindParam(7, $huff);
        $stmt->bindParam(8, $mugg);
        $stmt->bindParam(9, $housePHP);

        $stmt->execute();

}
else{
        header('Location: index.php');
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
        </body>
</html>
