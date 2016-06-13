<?php
require_once "../includes/dbconnection.php";
session_start();
if(!isset($_SESSION['email'])) {
  header("location: ../accounts/login.php");
}
  $currentuseremail = $_SESSION['email'];

//check connection
//if (!$db){
//    die("Connection failed: " . mysqli_connect_error());
//}

//Create query for db & fetch result
  $queryAll = "SELECT * FROM accounts2 WHERE accounts2.email = '$currentuseremail'";
  $result = mysqli_query($db, $queryAll);

//Create array & store results from db
  $accounts = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $accounts[] = $row;
  }
//Close connection
  mysqli_close($db);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../includes/style2.css"/>
</head>
<body>
<?php
require_once('../includes/navigation.template.php');


?>
<div id="hmenu">
  <h1> Uw account </h1>
  </div>

<div id="hmenu">
  <br><br>
<table>
  <thead>
  <tr>
    <th>Uw account nummer</th>
    <th>Uw email</th>
    <th>Voornaam</th>
    <th>Achternaam</th>
  </tr>
  </thead>


  <tbody>
<!--  loop through database to pick up user data-->
  <?php foreach ($accounts as $key => $user) { ?>
    <tr>
      <td><?php echo $user ["id"]; ?></td>
      <td><?php echo $user['email']; ?></td>
      <td><?php echo $user['voornaam']; ?></td>
      <td><?php echo $user['achternaam']; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
  <h5><a href="../accounts/accountedit.php">Klik hier om uw account gegevens aan te passen</a> </h5> <h5><a href="reservationsOverview.php">Klik hier om uw reserveringen te bekijken</a> </h5>
</div>


</body>
</html>
