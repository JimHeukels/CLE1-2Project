<?php
require_once "../includes/dbconnection.php";
session_start();
$currentuseremail= $_SESSION['email'];
print_r($_SESSION['id']);
print_r($_SESSION['email']);
print_r($_SESSION['admin']);

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
require_once('../includes/navigation.template.php')
?>

<form method="get" action="accounteditprocessing.php">
  <table>
    <thead>
    <tr>
      <th>Uw email</th>
      <th>Voornaam</th>
      <th>Achternaam</th>
    </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</form>
<?php foreach ($accounts as $key => $users) {
    ?>
    <div id="hmenu">
      <form action="accounteditprocessing.php" method="post">
        <input type="hidden" name="id" value=" <?php echo $users ["id"]; ?>"/>

        <label for="titel"> E-mail</label>
        <input type="text" id="email" name="email" value="<?php echo $users['email']; ?>"/>

        <label for="jaar"> Voornaam</label>
        <input type="text" id="voornaam" name="voornaam" value="<?php echo $users['voornaam']; ?>"/>

        <label for="genre"> Achternaam </label>
        <input type="text" id="achternaam" name="achternaam" value="<?php echo $users['achternaam']; ?>"/>


        <input type="submit" name="submit" title="submit" value="submit"/>

      </form>
    </div>
  <?php };



//};
//var_dump($key);
//var_dump($currentId);
//var_dump($boeken);
//var_dump($boekendb);
?>
</body>
</html>
