<?php
require_once "../includes/dbconnection.php";
session_start();
require '../includes/adminCheck.php';

//check connection
if (!$db){
    die("Connection failed: " . mysqli_connect_error());
}

$currentId = $_GET['id'];
$currentUserid = $_SESSION['id'];


//Create query for db & fetch result
$queryAll = "SELECT * FROM boekendb";
$result = mysqli_query($db, $queryAll);

//Create array & store results from db
$boekendb = [];
while ($row = mysqli_fetch_assoc($result)) {
    $boekendb[] = $row;
}




foreach ($boekendb as $key => $boeken) {
    if ($currentId == $key) {
        echo $boeken ["id"];
        $currentboekid = $boeken["id"];
        $sql = "INSERT INTO reserveringen(accounts2_id, boekendb_id) VALUES ('$currentUserid', '$currentboekid');";
        if ($db->query($sql) === TRUE) {
            header("location: ../site/reservationsOverview.php");
            echo "<br/><br/><span>Data Inserted successfully...!!</span>";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
    echo "current boek id is:" . $currentId . "current user id is:" . $currentUserid;


}



