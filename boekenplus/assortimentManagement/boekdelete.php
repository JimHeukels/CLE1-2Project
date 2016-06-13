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
    $queryAll = "SELECT * FROM boekendb";
    $result = mysqli_query($db, $queryAll);

//Create array & store results from db
    $boekendb = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $boekendb[] = $row;
    }
    $sql = "DELETE FROM boekendb WHERE id='$currentId'";


    if ($db->query($sql) === TRUE) {
        //is book is deleted succesfully, redirect user back to book overview
        echo "Boek is uit de database verwijderd!";
                header("location: ../site/assortiment.php");
        //if deleting fails, show error message
    } else {
        echo "Er is een fout opgetreden tijdens het verwijderen van het boek: " . $db->error;
    }

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

