
 <!DOCTYPE html>
<?php
if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        if($fname == "" || $lname == ""){
                header('Location: index.php?errorMssg='.urlencode('name'));
        }
        if(!empty($_FILES['profPic'])){
                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["profPic"]["name"]);
                $extension = end($temp);
                if ((($_FILES["profPic"]["type"] == "image/gif")
                || ($_FILES["profPic"]["type"] == "image/jpeg")
                || ($_FILES["profPic"]["type"] == "image/jpg")
                || ($_FILES["profPic"]["type"] == "image/pjpeg")
                || ($_FILES["profPic"]["type"] == "image/x-png")
                || ($_FILES["profPic"]["type"] == "image/png"))
                && ($_FILES["profPic"]["size"] < 50000)
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
                    <input type='hidden' id="gryff" name="gryff" value="">
                    <input type='hidden' id="slyth" name="slyth" value="">
                    <input type='hidden' id="rave" name="rave" value="">
                    <input type='hidden' id="huff" name="huff" value="">
                    <input type='hidden' id="mugg" name="mugg" value="">
                    <input type='hidden' id="total" name="total" value="">
                    <input type='hidden' id="count" name="count" value="">
                    <?php echo '<input type="hidden" id="fname" name="fname" value="' . $fname . '">' ?>
                    <?php echo '<input type="hidden" id="lname" name="lname" value="' . $lname . '">' ?>
                    <?php echo '<input type="hidden" id="profPic" name="profPic" value="' . $profPic . '">' ?>
                    <input type="submit" value="" name="results" id="results">
                  </form>
                </div>
                <script type="text/javascript" src="js/quiz.js"></script>       
        </body>
</html>
