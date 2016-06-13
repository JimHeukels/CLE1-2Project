<?php
require_once "../includes/dbconnection.php";
session_start();
require '../includes/adminCheck.php';

//check connection
if (!$db){
    die("Connection failed: " . mysqli_connect_error());
}

//gets id for current book, followed by id user id
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



//loop through database to find book that matches current book id
foreach ($boekendb as $key => $boeken) {
    //when book is found, add a reservation for the current user into the reservation table in the database
    if ($currentId == $key) {
        echo $boeken ["id"];
        $currentboekid = $boeken["id"];
        $sql = "INSERT INTO reserveringen(accounts2_id, boekendb_id) VALUES ('$currentUserid', '$currentboekid');";
        if ($db->query($sql) === TRUE) {
            //if reservation is succesfull, user is sent to reservation overview page
            header("location: ../site/reservationsOverview.php");
            echo "<br/><br/><span>Data Inserted successfully...!!</span>";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
    echo "current boek id is:" . $currentId . "current user id is:" . $currentUserid;


}



