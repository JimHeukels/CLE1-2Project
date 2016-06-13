<?php
require_once "../includes/dbconnection.php";
session_start();
require '../includes/adminCheck.php';

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

// Fetching variables of the form which travels in URL

if(isset($_POST['add'])) {
  $titel = $_POST['titel'];
  $auteur = $_POST['auteur'];
  $genre = $_POST['genre'];
  $jaar = $_POST['jaar'];
  $voorraad = $_POST['voorraad'];
  $inhoud = $_POST['inhoud'];

  //escape strings for security
  $titel = mysqli_real_escape_string($db, $titel);
  $auteur = mysqli_real_escape_string($db, $auteur);
  $genre = mysqli_real_escape_string($db, $genre);
  $jaar = mysqli_real_escape_string($db, $jaar);
  $voorraad = mysqli_real_escape_string($db, $voorraad);
  $inhoud = mysqli_real_escape_string($db, $inhoud);


//Insert Query of SQL

  $sql = "INSERT INTO boekendb(titel, auteur, genre, jaar, voorraad, inhoud) VALUES ('$titel', '$auteur', '$genre', '$jaar', '$voorraad', '$inhoud');";


if ($db->query($sql) === TRUE) {
  //if book is inserted correctly, redirect user to book overview
    header("location: ../site/assortiment.php");
    echo "<br/><br/><span>Data Inserted successfully...!!</span>";
  } else {
    echo "Error: " . $sql . "<br>" . $db->error;
  }


// Closing Connection with Server
  mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>

</body>
</html>
