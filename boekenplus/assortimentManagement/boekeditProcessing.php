<?php
require_once "../includes/dbconnection.php";
session_start();
$currentId = $_POST['id'];

//check connection
if (!$db){
  die("Connection failed: " . mysqli_connect_error());
}

//Create query for db & fetch result
$queryAll = "SELECT * FROM boekendb";
$result = mysqli_query($db, $queryAll);

//Create array & store results from db
$boekendb = [];
while ($row = mysqli_fetch_assoc($result)) {
  $boekendb[] = $row;
}

if (isset($_POST['submit'])) {
  $titel = $_POST['titel'];
  $auteur = $_POST['auteur'];
  $genre = $_POST['genre'];
  $jaar = $_POST['jaar'];
  $voorraad = $_POST['voorraad'];

  $titel = mysqli_real_escape_string($db, $titel);
  $auteur = mysqli_real_escape_string($db, $auteur);
  $genre = mysqli_real_escape_string($db, $genre);
  $jaar = mysqli_real_escape_string($db, $jaar);
  $voorraad = mysqli_real_escape_string($db, $voorraad);

  $sql = "UPDATE `boekenplus_database`.`boekendb` SET `titel` = '$titel', `auteur` = '$auteur', `genre` = '$genre', `jaar` = '$jaar', `inhoud` = '$inhoud', `voorraad` = '$voorraad' WHERE `boekendb`.`id` = '$currentId' ";

  if ($insert = $db->query($sql) === TRUE) {
    header("location: ../site/assortiment.php");
    echo "<br/><br/><span>Data Inserted successfully...!!</span>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($insert);
  }

// Closing Connection with Server
  mysqli_close($db);
}
?>
