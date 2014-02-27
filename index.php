
 <!DOCTYPE html>
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
                        <form id="login" action="questions.php" method="post">
                                <label>First Name</label>
                                <input type="text" size="50">
                                <label>Last Name</label>
                                <input type="text" size="50">
                                <label>Username</label>
                                <input type="text" size="50">
                                <label>Profile Picture</label>
                                <input type="file" name="pic" accept="image/*">
                                <input type="submit" value="Sort Me!" id="toSort">
                        </form>
                </div>
        </body>
</html>
