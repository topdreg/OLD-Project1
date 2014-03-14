
 <!DOCTYPE html>
<?php
if(isset($_POST['submit'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $count = 0;
        $gryff = 0;
        $slyth = 0;
        $rave = 0;
        $huff = 0;
        $mugg = 0;

        include('appData.txt');

        try 
        { 
         $dbh = new PDO('mysql:host='.$server.';port='.$port.';dbname='.$dbname, $user, $pass);
        } catch (PDOException $e) {
         print $e->getMessage();
         exit;
        } 

        $query= "SELECT DISTINCT p.username AS username
                        FROM player p
                        WHERE p.username = ?";
        $stmt= $dbh->prepare($query);
        $stmt->bindParam(1, $username);

        if($stmt->execute()){
                if($row = $stmt->fetch()){
                        $dbh = null;
                        header('Location: index.php?errorMssg='.urlencode('username'));
                }
        }

        if($fname == "" || $lname == "" || $username =="" || $password == ""){
                header('Location: index.php?errorMssg='.urlencode('name'));
        }
        else if(strlen($password) < 8){
                header('Location: index.php?errorMssg='.urlencode('passLength'));
        }
        else if($_FILES['profPic']['name'] != ""){
                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["profPic"]["name"]);
                $extension = end($temp);
                if ((($_FILES["profPic"]["type"] == "image/gif")
                || ($_FILES["profPic"]["type"] == "image/jpeg")
                || ($_FILES["profPic"]["type"] == "image/jpg")
                || ($_FILES["profPic"]["type"] == "image/pjpeg")
                || ($_FILES["profPic"]["type"] == "image/x-png")
                || ($_FILES["profPic"]["type"] == "image/png"))
                && ($_FILES["profPic"]["size"] < 512000)
                && in_array($extension, $allowedExts)){
                        if ($_FILES["profPic"]["error"] > 0){
                        header('Location: index.php?errorMssg='.urlencode('image'));
                    }
                        else{
                                $image_name = $_FILES['profPic'] ['name'];
                                $image_tmp_name = $_FILES['profPic'] ['tmp_name'];
                                $profPic = "userphotos/" . $image_name;
                                #/userphotos is a folder which must exist in the file system
                                move_uploaded_file($image_tmp_name,$profPic);
                                
                        }
                }
                else{
                  header('Location: index.php?errorMssg='.urlencode('file'));
                }
        }
        else{
                $profPic = "userphotos/default.png";
        }
}
else if(isset($_POST['continue'])){

        include('appData.txt');
        
        try 
        { 
         $dbh = new PDO('mysql:host='.$server.';port='.$port.';dbname='.$dbname, $user, $pass);
        } catch (PDOException $e) {
         print $e->getMessage();
         exit;
        } 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT p.fname AS fname, p.lname AS lname, p.link AS link, p.g AS g, p.h AS h, p.r AS r, p.s AS s, p.m AS m, p.house AS house, p.questionNum as questionNum
                                        FROM player p 
                        WHERE p.username = ? AND p.password = ?";

        $stmt = $dbh->prepare($query);
        $stmt->bindParam(1, $username); 
        $stmt->bindParam(2, $password); 

        if($stmt->execute()) {
    if($row = $stmt->fetch()){
      $fname = $row['fname'];
      $lname = $row['lname'];
      $profPic = $row['link'];
      $count = $row['questionNum'];
      $gryff=$row['g'];
      $huff=$row['h'];
      $rave=$row['r'];
      $slyth=$row['s'];
      $mugg = $row['m'];
      if($row['house'] == 'g'){
        $house = "Gryffindor";
      }
      else if($row['house'] == 's'){
        $house = "Slytherine";
      }
      else if($row['house'] == 'r'){
        $house = "Ravenclaw";
      }
      else if($row['house'] == 'h'){
        $house = "Hufflepuff";
      }
      else if($row['house'] == 'm'){
        $house = "Muggle";
      }
      else{
        $house = "";
      }
    }
  }

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
                        <p id = "status"></p>
                  <h3 id="questionHeader"></h3>
                  
                  <form id="questionForm" action="results.php" method="post">
                    <input type="radio" name="choice" value="0" id="choice0">
                    <label id="answ1"></label>
                    <br>
                    <input type="radio" name="choice" value="1" id="choice1">
                    <label id="answ2"></label>
                    <br>
                    <input type="radio" name="choice" value="2" id="choice2">
                    <label id="answ3"></label>
                    <br>
                    <input type="radio" name="choice" value="3" id="choice3">
                    <label id="answ4"></label>
                    <br>
                        <input type="radio" name="choice" value="4" id="choice4">
                    <label id="answ5"></label>
                    <br>
                    <button id="next">Next</button>
                    <?php echo '<input type="hidden" id="gryff" name="gryff" value="' . $gryff . '">' ?>
                    <?php echo '<input type="hidden" id="slyth" name="slyth" value="' . $slyth . '">' ?>
                    <?php echo '<input type="hidden" id="rave" name="rave" value="' . $rave . '">' ?>
                    <?php echo '<input type="hidden" id="huff" name="huff" value="' . $huff . '">' ?>
                    <?php echo '<input type="hidden" id="mugg" name="mugg" value="' . $mugg . '">' ?>
                    <?php echo '<input type="hidden" id="fname" name="fname" value="' . $fname . '">' ?>
                    <?php echo '<input type="hidden" id="lname" name="lname" value="' . $lname . '">' ?>
                    <?php echo '<input type="hidden" id="username" name="username" value="' . $username . '">' ?>
                    <?php echo '<input type="hidden" id="password" name="password" value="' . $password . '">' ?>
                    <?php echo '<input type="hidden" id="profPic" name="profPic" value="' . $profPic . '">' ?>
                    <input type="submit" value="" name="results" id="results">
                  </form>

                  <form id="saveForm" method="post" action="login.php">
                    <?php echo '<input type="hidden" id="gryff" name="gryff" value="' . $gryff . '">' ?>
                    <?php echo '<input type="hidden" id="slyth" name="slyth" value="' . $slyth . '">' ?>
                    <?php echo '<input type="hidden" id="rave" name="rave" value="' . $rave . '">' ?>
                    <?php echo '<input type="hidden" id="huff" name="huff" value="' . $huff . '">' ?>
                    <?php echo '<input type="hidden" id="mugg" name="mugg" value="' . $mugg . '">' ?>
                    <input type='hidden' id="house" name="house" value="">
                    <?php echo '<input type="hidden" id="count" name="count" value="' . $count . '">' ?>
                    <?php echo '<input type="hidden" id="fname" name="fname" value="' . $fname . '">' ?>
                    <?php echo '<input type="hidden" id="lname" name="lname" value="' . $lname . '">' ?>
                    <?php echo '<input type="hidden" id="username" name="username" value="' . $username . '">' ?>
                    <?php echo '<input type="hidden" id="password" name="password" value="' . $password . '">' ?>
                    <?php echo '<input type="hidden" id="profPic" name="profPic" value="' . $profPic . '">' ?>
                     <button id="save">Save and Exit</button>
                        <input type="submit" value="" name="saveSubmit" id="saveSubmit">
                  </form>
                </div>
                <script type="text/javascript" src="js/quiz.js"></script>
                <script src= "js/jquery-1.11.0.min.js"></script>        
        </body>
</html>
