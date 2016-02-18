<?php
require_once "../../includes/dbconnection.php";
session_start();

$sql ="SELECT * FROM `reserveringen` JOIN boekendb bdb ON bdb.id = reserveringen.boekendb_id";

//Create query for db & fetch result
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_all($result);

$reserveringen = [];
//Close connection
mysqli_close($db);


//De query die op deze pagin wordt uitgevoerd laat alle reserveringen in de gehele database zien.
//De reserveringen die uit de database worden opgehaald worden vervolgens in de tabel gezet die hieronder in de html wordt aangemaakt.
//Op deze manier kunnen admins alle reserveringen makkelijk overzien.

//deze code werkt momenteel echter nog niet. gek genoeg pakt hij nu alleen de reserveringen van account id 5
// hij pakt niet de reserveringen van account nummer 4, en ik heb nog geen nieuwe account geprobeerd aan te maken om daar vervolgens mee te reserveren.
// hetgeen waar ik van verdenk dat het het probleem is, is dat account nummer 4 momenteel geen wachtwoord heeft aangezien dit account is aangemaakt toen ik nog geen correct wachtwoord hash had
//        OF
// Omdat ik nog geen andere
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../includes/style1.css"/>
</head>
<body>
<h2 class="offscreen">Nav bar</h2>
<div id="hmenu">
    <h1>Reserveringen</h1>
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
    <th>Reserverings Nummer</th>
<!--    <th>Gereserveerd door</th>-->
    <th>Titel</th>
    <th>Auteur</th>
    <th>Genre</th>
    <th>Jaar van uitgave</th>
  </tr>
  </thead>
  <tfoot>

  </tfoot>
  <tbody>
  <?php foreach ($data as $reservations) {
    ?>
    <tr>
      <td><?php echo $reservations[0]; ?></td>
<!--      <td>--><?php //echo $reservations[10];?><!-- </td>-->
      <td><?php echo $reservations[4]; ?></td>
      <td><?php echo $reservations[5]; ?></td>
      <td><?php echo $reservations[6]; ?></td>
      <td><?php echo $reservations[7]; ?></td>
    </tr>
    <?php
  };
//  tabel keys:
//  0:Reserverings nummer
//  1:Account id van het account dat de reserveringen heeft geplaatst
//  2:ID van het gereserveerde boek
//  3:ID van het gereserveerde boek
//  4:titel van het gereserveerde boek
//  5:Auteur van het gereserveerde boek
//  6:Genre van het gereserveerde boek
//  7:Jaar van uitgave van het gereserveerde boek
//  8:Inhoud van het boek
//  9:Image pad uit de boekendb database
//  10:Voorraad

//  11: niks. na 10 worden er geen keys meer overgepakt

//  var_dump($data);
  ?>
  </tbody>
</table>

</body>
</html>
