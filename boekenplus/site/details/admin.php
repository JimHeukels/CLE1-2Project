<?php
require_once "../../includes/dbconnection.php";
session_start();
require '../../includes/adminCheck.php';
$currentId = $_GET['id'];
//var_dump($musicAlbums);
//print_r($musicAlbums);

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

//print_r($albums)
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../includes/style1.css"/>
</head>
<body>
<div id="hmenu">
  <h1>Welkom bij de BoekenPlus</h1>

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
<table>
  <thead>
  <tr>
    <th>Boek ID</th>
    <th>Boek cover</th>
    <th>Auteur</th>
    <th>titel</th>
    <th>Jaar van uitgave</th>
    <th>Genre</th>
    <th>Aantal</th>
    <th>Pas dit boek aan</th>
    <th>Verwijder dit boek</th>
  </tr>
  </thead>
  <tfoot>
  </tfoot>
  <tbody>
  <?php foreach ($boekendb as $key => $boeken) {
    if ($currentId == $key) {
      ?>
      <tr>
        <td><?php echo $boeken ["id"]; ?></td>
        <td><img src="<?php echo $boeken['cover']; ?>"></td>
        <td><?php echo $boeken['auteur']; ?></td>
        <td><?php echo $boeken['titel']; ?></td>
        <td><?php echo $boeken['jaar']; ?></td>
        <td><?php echo $boeken['genre']; ?></td>
        <td><?php echo $boeken['voorraad']; ?></td>
        <td><a href="../../assortimentManagement/boekedit.php?id<?= $key; ?>"> Pas boek aan</a> </td>
        <td><a href="../../assortimentManagement/boekdelete.php"> Verwijder boek</a>  </td>
      </tr>
    <?php };
  };
  //    print_r($key);
  //    print_r(" ","");
  //    var_dump($boekendb);

  ?>
  </tbody>
</table>

</body>
</html>
