
 <!DOCTYPE html>
<?php
if(isset($_GET['errorMssg'])){
        if($_GET['errorMssg'] == "name"){
                echo "<script> alert('You must enter a first name, last name, username and password')</script>";
        }
        if($_GET['errorMssg'] == "image"){
                echo "<script> alert('There was an error in your image, please choose another')</script>";
        }
        if($_GET['errorMssg'] == "file"){
                echo "<script> alert('You chose an invalid file, please choose another')</script>";
        }
        if($_GET['errorMssg'] == "passLength"){
                echo "<script> alert('Your password must be at least 8 characters long')</script>";
        }
        if($_GET['errorMssg'] == "username"){
                echo "<script> alert('There is already a user with your chosen username, please choose another one')</script>";
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
                        <a href="index.php">Virtual Sorting Hat</a>     
                </header>
                <div class="main">
                <h3>Create A Profile</h3>
                        <div id="login"><p>Already a User? &nbsp</p><a href="login.php">Login</a></div>
                        <form id="createProfile" action="questions.php" method="post" enctype="multipart/form-data">
                                <label>First Name</label>
                                <input type="text" size="35" id="fname" name="fname">
                                <label>Last Name</label>
                                <input type="text" size="35" id="lname" name="lname">
                                <label>Username</label>
                                <input type="text" size="35" id="username" name="username">
                                <label>Password</label>
                                <input type="password" size="35" id="password" name="password">
                                <label>Profile Picture</label><br/>
                                <label id="note">Images must be a gif, jpg, jpeg, or png less than 500kb</label>
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
