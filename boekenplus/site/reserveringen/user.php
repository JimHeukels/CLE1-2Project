<?php
require_once "../../includes/dbconnection.php";
session_start();
$currentUserid = $_SESSION['id'];
$sql ="SELECT * FROM `reserveringen` JOIN boekendb bdb ON bdb.id = reserveringen.boekendb_id WHERE reserveringen.accounts2_id = '$currentUserid'";

//Create query for db & fetch result
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_all($result);

//bugfix
//print_r($data);

$reserveringen = [];
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
  <nav>
    <ul>
      <li><a href="../../site/Home/user.php"> Home </a></li>
      <li><a href="../../site/about_us/user.php"> Over ons </a></li>
      <li><a href="../../site/assortiment/user.php"> Ons assortiment </a> </li>
      <li><a href="../../accounts/logout.php"> Uitloggen </a></li>
    </ul>
  </nav>
</div>
<br><br><br><br>

<table>
  <thead>
  <tr>
    <th>Reserverings Nummer</th>
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
      <td><?php echo $reservations[4]; ?></td>
      <td><?php echo $reservations[5]; ?></td>
      <td><?php echo $reservations[6]; ?></td>
      <td><?php echo $reservations[7]; ?></td>
    </tr>
    <?php
  };
  ?>
  </tbody>
</table>

</body>
</html>
