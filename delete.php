
 <?php

include('appData.txt');

try 
{ 
 $dbh = new PDO('mysql:host='.$server.';port='.$port.';dbname='.$dbname, $user, $pass);
} catch (PDOException $e) {
 print $e->getMessage();
 exit;
} 

$username = $_POST["username"];

$query = "DELETE FROM player
                      WHERE username = ?";

$stmt = $dbh->prepare($query);
$stmt->bindParam(1, $username); 
$stmt->execute();

$dbh = null;
header('Location: login.php?errorMssg='.urlencode("delete"));
?>
