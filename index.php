
 <!DOCTYPE html>
<?php
if(isset($_GET['errorMssg'])){
        if($_GET['errorMssg'] == "name"){
                echo "<script> alert('Please enter both a first and last name')</script>";
        }
        if($_GET['errorMssg'] == "image"){
                echo "<script> alert('There was an error in your image, please choose another')</script>";
        }
                if($_GET['errorMssg'] == "file"){
                echo "<script> alert('You choose an invalid file, please choose another')</script>";
        }
}
?>
<html lang="en">
        <head>
                <title>Virtual Sorting Hat</title>
                <link rel="stylesheet" type="text/css" href="css/main.css"/>
        </head>

        <body>
                <header>
                        <p>Virtual Sorting Hat<p>       
                </header>
                <div class="main">
                <h3>Create A Profile</h3>
                        <form id="login" action="questions.php" method="post" enctype="multipart/form-data">
                                <label>First Name</label>
                                <input type="text" size="50" id="fname" name="fname">
                                <label>Last Name</label>
                                <input type="text" size="50" id="lname" name="lname">
                                <label>Profile Picture</label>
                                <input type="file" accept="image/*" id="profPic" name="profPic">
                                <div id="imgPrevDiv"></div>
                                <input type="submit" value="Sort Me!" id="submit" name="submit">
                        </form>
                </div>
                <script src= "js/jquery-1.11.0.min.js"></script>
                <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgPrev').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
                $("#profPic").change(function(){
                $("#imgPrevDiv").append('<img src="#" id="imgPrev" width="100" height="auto">');
                readURL(this);
        });
        
                </script>
        </body>
</html>
