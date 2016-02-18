<?php

require_once "../includes/dbconnection.php";
session_start();
$currentuserId= $_SESSION['id'];

//check connection
if (!$db){
  die("Connection failed: " . mysqli_connect_error());
}

//Create query for db & fetch result
$queryAll = "SELECT * FROM accounts2";
$result = mysqli_query($db, $queryAll);

//Create array & store results from db
$accounts = [];
while ($row = mysqli_fetch_assoc($result)) {
  $accounts[] = $row;
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $voornaam = $_POST['voornaam'];
  $achternaam = $_POST['achternaam'];


  $email = mysqli_real_escape_string($db, $email);
  $voornaam = mysqli_real_escape_string($db, $voornaam);
  $achternaam = mysqli_real_escape_string($db, $achternaam);


  $sql = "UPDATE `boekenplus_database`.`accounts2` SET `email` = '$email', `voornaam` = '$voornaam', `achternaam` = '$achternaam' WHERE `accounts2`.`id` = '$currentuserId' ";

  if ($insert = $db->query($sql) === TRUE) {
    header("location: ../site/account.php");
    echo "<br/><br/><span>Data Inserted successfully...!!</span>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($insert);
  }

// Closing Connection with Server
  mysqli_close($db);
}
?>
