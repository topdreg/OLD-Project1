
 <!DOCTYPE html>
<?php
if(isset($_POST['edit'])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
}
else{
  header('Location: login.php');
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
    <a href="login.php" class="logout">Log out</a>
        <form action="delete.php" method="post"><?php echo '<input type="hidden" id="username" name="username" value="' . $username . '">'; ?><input type="submit" name="delete" id="delete" value="Delete Profile"></form>
    <h3>Edit Profile</h3>
    <?php       
    echo '<form method="post" action="profile.php" id="editForm" enctype="multipart/form-data">';
    echo '<input name="reference" type="hidden" value="'. $username .'"><br/>';
    echo '<label>First Name:</label> <br/><input name="fname" id="fname" size ="35" type="text" value="'. $fname .'"><br/>';
    echo '<label>Last Name:</label> <br/><input name="lname" id="lname" size ="35" type="text" value="'. $lname .'"><br/>';
    echo '<label>Username:</label> <br/><input name="username" id="username" size ="35" type="text" value="'. $username .'"><br/>';
    echo '<label>Password:</label> <br/><input name="password" id="password" size ="35" type="text" value="'. $password .'"><br/>';
    echo '<label>Profile Picture:</label><input type="file" accept="image/*" id="profPic" name="profPic"><br/>';
    echo '<div id="imgPrevDiv"></div>';
    echo '<button id="saveEdit">Save</button>';
    echo '<input type="submit" name="hiddenSubmit" id="hiddenSubmit"></form>'; 
    echo '</form>';
    ?>
    </div>
    <script src= "js/jquery-1.11.0.min.js"></script>
    <script>
      var editButton = document.getElementById("saveEdit");
      editButton.addEventListener("click", function(e){
        if(document.getElementById('fname').value == "" || document.getElementById('lname').value == "" || document.getElementById('username').value == "" || document.getElementById('password').value == ""){
          alert("You cannot leave any fields blank");
        }
        else{
          document.getElementById('hiddenSubmit').click();
        }
      });
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
