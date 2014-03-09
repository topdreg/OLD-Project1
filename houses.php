
 <!DOCTYPE html>
<?php
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
    <div class="main houses">
      <div id="gryffindor" class="houseCol">
        <img src="images/gryffindor.png">
        <h4>Gryffindor</h4>
        <?php
          //prints every player stuff  
          $query = "SELECT DISTINCT p.fname AS firstName, p.lname AS lastName, p.link AS link
                   FROM  player p
                   WHERE p.house = 'g'";

          $stmt = $dbh->prepare($query);

          if($stmt->execute()) 
             {

               while($row = $stmt->fetch())
               {
                echo ("<div class ='user'>");
                 echo ("<img class='userImg' src='". $row['link']."'>");          
                 echo ("<div class = 'nameDiv'><p class= 'userName'>".$row['firstName']." ".$row['lastName']."</p></div>");
                 echo ('</div>');
               }
           }
            
        ?>
      </div>
      <div id="slytherin" class="houseCol">
        <img src="images/slytherin.png">
        <h4>Slytherin</h4>
        <?php
          //prints every player stuff  
          $query = "SELECT DISTINCT p.fname AS firstName, p.lname AS lastName, p.link AS link
                   FROM  player p
                   WHERE p.house = 's'";

          $stmt = $dbh->prepare($query);

          if($stmt->execute()) 
             {

               while($row = $stmt->fetch())
               {
                echo ("<div class ='user'>");
                 echo ("<img class='userImg' src='". $row['link']."'>");           
                 echo ("<div class = 'nameDiv'><p class= 'userName'>".$row['firstName']." ".$row['lastName']."</p></div>");
                 echo ('</div>');
               }
           }
            
        ?>
      </div>
      <div id="ravenclaw" class="houseCol">
        <img src="images/ravenclaw.png">
        <h4>Ravenclaw</h4>   
        <?php
          //prints every player stuff  
          $query = "SELECT DISTINCT p.fname AS firstName, p.lname AS lastName, p.link AS link
                   FROM  player p
                   WHERE p.house = 'r'";

          $stmt = $dbh->prepare($query);

          if($stmt->execute()) 
             {

               while($row = $stmt->fetch())
               {
                echo ("<div class ='user'>");
                 echo ("<img class='userImg' src='". $row['link']."'>");          
                 echo ("<div class = 'nameDiv'><p class= 'userName'>".$row['firstName']." ".$row['lastName']."</p></div>");
                 echo ('</div>');
               }
           }
            
        ?>     
      </div>
      <div id="hufflepuff" class="houseCol">
        <img src="images/hufflepuff.png">
        <h4>Hufflepuff</h4> 
        <?php
          //prints every player stuff  
          $query = "SELECT DISTINCT p.fname AS firstName, p.lname AS lastName, p.link AS link
                   FROM  player p
                   WHERE p.house = 'h'";

          $stmt = $dbh->prepare($query);

          if($stmt->execute()) 
             {

               while($row = $stmt->fetch())
               {
                echo ("<div class ='user'>");
                 echo ("<img class='userImg' src='". $row['link']."'>");           
                 echo ("<div class = 'nameDiv'><p class= 'userName'>".$row['firstName']." ".$row['lastName']."</p></div>");
                 echo ('</div>');
               }
           }

        ?>
      </div>
      <div id="muggle" class="houseCol">
        <img src="images/muggle.png">
        <h4>Muggle</h4>
        <?php
          //prints every player stuff  
          $query = "SELECT DISTINCT p.fname AS firstName, p.lname AS lastName, p.link AS link
                   FROM  player p
                   WHERE p.house = 'm'";

          $stmt = $dbh->prepare($query);

          if($stmt->execute()) 
             {

               while($row = $stmt->fetch())
               {
                echo ("<div class ='user'>");
                echo ("<img class='userImg' src='". $row['link']."'>");           
                echo ("<div class = 'nameDiv'><p class= 'userName'>".$row['firstName']." ".$row['lastName']."</p></div>");
                echo ('</div>');
               }
           }

           $dbh = null;
            
        ?>
      </div>
    </div>
  </body>
</html>
