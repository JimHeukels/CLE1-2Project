<?php
require_once "../includes/dbconnection.php";
session_start();

$currentId = $_GET['id'];
//print_r($currentId);

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
//print_r($_SESSION['email']);
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
<div id="hmenu">
  <h1>Boek details</h1>

  <?php if (isset($_SESSION['admin'])){
   $admintoken = $_SESSION['admin'];
   if ($admintoken == !0) {?>
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
        <td><?= $boeken ["id"]; ?></td>
        <td><img src="<?php echo $boeken['cover']; ?>"></td>
        <td><?= $boeken['auteur']; ?></td>
        <td><?= $boeken['titel']; ?></td>
        <td><?= $boeken['jaar']; ?></td>
        <td><?= $boeken['genre']; ?></td>
        <td><?= $boeken['voorraad']; ?></td>
        <td><a href="../assortimentManagement/boekedit.php?id=<?= $key; ?>"> Pas boek aan</a> </td>
        <td><a href="../assortimentManagement/boekdelete.php?id=<?= $key; ?>"> Verwijder boek</a>  </td>
      </tr>
    <?php };
  };
  //    print_r($key);
  //    print_r(" ","");
  //    var_dump($boekendb);

  ?>
  </tbody>
</table>

  <?php }}

   if (isset($_SESSION['admin'])){
   $admintoken = $_SESSION['admin'];
   if ($admintoken == 0) {?>
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
      <th>Boek reserveren</th>
    </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    <?php foreach ($boekendb as $key => $boeken) {
      if ($currentId == $key) {
        ?>
        <tr>
          <td><?= $boeken ["id"]; ?></td>
          <td><img src="<?php echo $boeken['cover']; ?>"></td>
          <td><?= $boeken['auteur']; ?></td>
          <td><?= $boeken['titel']; ?></td>
          <td><?= $boeken['jaar']; ?></td>
          <td><?= $boeken['genre']; ?></td>
          <td><?= $boeken['voorraad']; ?></td>
          <td><a href="../reserveringen/reservationAdd.php?id=<?= $key ?>">Klik hier om dit boek te reserveren </a></td>

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

<?php }}else { ?>

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
      <th>Reserveer boek</th>
    </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    <?php foreach ($boekendb as $key => $boeken) {
      if ($currentId == $key) {
        ?>
        <tr>
          <td><?= $boeken ["id"]; ?></td>
          <td><img src="<?php echo $boeken['cover']; ?>"></td>
          <td><?= $boeken['auteur']; ?></td>
          <td><?= $boeken['titel']; ?></td>
          <td><?= $boeken['jaar']; ?></td>
          <td><?= $boeken['genre']; ?></td>
          <td><?= $boeken['voorraad']; ?></td>
          <td><a href="../reserveringen/reservationAdd.php">Klik om dit boek te reserveren</a> </td>

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
<?php }?>
