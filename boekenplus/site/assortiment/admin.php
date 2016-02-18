<?php
require_once "../../includes/dbconnection.php";
session_start();


//Create query for db & fetch result
$queryAll = "SELECT * FROM boekendb";
$result = mysqli_query($db, $queryAll);

//Create array & store results from db
$boekendb = [];
while ($row = mysqli_fetch_assoc($result)) {
  $boekendb[] = $row;
}

//Close connection
mysqli_close($db);
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../../includes/style1.css"/>
</head>
<body>
<div id="hmenu">
  <nav>
    <ul>
      <li><a href="../../site/Home/admin.php"> Home </a></li>
      <li><a href="../../site/assortiment/admin.php"> Assortiment </a> </li>
      <li><a href="../../site/about_us/admin.php"> Over ons </a></li>
      <li><a href="../../accounts/logout.php"> Uitloggen </a></li>

      <br><br>
      <li><a href="../reserveringen/admin.php"> Reserveringsoverzicht</a> </li>
      <li><a href="../../assortimentManagement/boekadd.php"> Boek toevoegen </a></li>
    </ul>
  </nav>
</div>
<br><br><br>
<br><br><br>
<div id="hmenu">
  <h1>Ons geweldige aanbod!</h1>
  <table>
    <thead>
    <tr>
      <th>Boek ID</th>
      <th>Boek cover</th>
      <th>Auteur</th>
      <th>Boek titel</th>
      <th>Jaar van uitgave</th>
      <th>Genre</th>
      <th>Voorraad status</th>
      <th>boek verwijderen</th>
      <th>Boek details</th>
    </tr>
    </thead>


    <tbody>
    <?php foreach ($boekendb as $key => $boeken) { ?>
      <tr>
        <td><?php echo $boeken ["id"]; ?></td>
        <td><a href="../details/admin.php?id=<?= $key; ?>"><img src="<?php echo $boeken['cover']; ?>"></a></td>
        <td><?php echo $boeken['auteur']; ?></td>
        <td><?php echo $boeken['titel']; ?></td>
        <td><?php echo $boeken['jaar']; ?></td>
        <td><?php echo $boeken['genre']; ?></td>
        <td><?php echo $boeken['voorraad']; ?></td>
        <td><a href="../../assortimentManagement/boekdelete.php?id<?= $key; ?>">Boek verwijderen</a> </td>
        <td><a href="../details/admin.php?id=<?= $key; ?>">Details page</a></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
