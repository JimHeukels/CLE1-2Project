<?php
require_once "../includes/dbconnection.php";
session_start();
$currentId = $_GET['id'];

//check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {

//Create query for db & fetch result
    $queryAll = "SELECT * FROM reserveringen";
    $result = mysqli_query($db, $queryAll);

//Create array & store results from db
    $reservations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $reservations[] = $row;
    }
    //delete reservation from database where book id matches
    $sql = "DELETE FROM reserveringen WHERE reserveringen.reservering_id='$currentId'";
    print_r($currentId);

    if ($db->query($sql) === TRUE) {
        //if reservation is deleted succesfully, redirect user to reservation overview
        echo "Reservering is uit de database verwijderd!";
        header("location: ../site/reservationsOverview.php");

    } else {
        echo "Er is een fout opgetreden tijdens het verwijderen van de reservering: " . $db->error;
    }
    print_r($currentId);
}


//Close connection
mysqli_close($db);
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

