
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
        $username = $_POST["username"];
        $password = $_POST["password"];
        $profPic = $_POST["profPic"];
        $gryff = $_POST["gryff"];
        $slyth = $_POST["slyth"];
        $rave = $_POST["rave"];
        $huff = $_POST["huff"];
        $mugg = $_POST["mugg"];
        $count = NULL;

        $query= "SELECT DISTINCT p.username AS username
                                         FROM player p
                                         WHERE p.username = ?";
        $stmt= $dbh->prepare($query);
        $stmt->bindParam(1, $username);

        if($stmt->execute()){
                if($row = $stmt->fetch()){
                        $query = "DELETE FROM player
                                        WHERE username = ?";

                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam(1, $username); 
                        $stmt->execute();
                }
        }

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
        
        $query = "INSERT INTO player VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

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
        $stmt->bindParam(10, $username);
        $stmt->bindParam(11, $password);
        $stmt->bindParam(12, $count);

        $stmt->execute();

 $dbh = null;
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
                        <a href="index.php">Virtual Sorting Hat</a>     
                </header>
                <div class="main">
                        <a href="login.php" class="logout">Log Out</a>
                        <form method="post" action="profile.php">
                    <?php echo '<input type="hidden" id="username" name="username" value="' . $username . '">' ?>
                    <?php echo '<input type="hidden" id="password" name="password" value="' . $password . '">' ?>
                                <input type="submit" value="View Profile" name="viewProf" id="viewProf">
                        </form>
                         <?php echo "<img id='house_crest' src=" . $img . ">" ?>

                        <?php echo "<h4 id ='house'>Welcome to " . $house . "!</h4>" ?>
                        <h5>Your scores were:</h5>
                        <?php echo "<p id='results'>". $gryff . " points for Gryffindor <br/>". $slyth . " points for Slytherin <br/>" . $rave . " points for Ravenclaw <br/>" . $huff . " points for Hufflepuff <br/> " . $mugg . " points for Muggle<br/>" ?>

                        <a href="houses.php">See who else got sorted &#62;</a>
                </div>
        </body>
</html>
