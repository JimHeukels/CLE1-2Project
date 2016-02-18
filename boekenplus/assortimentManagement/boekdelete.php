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
    print_r($currentId);

    if ($db->query($sql) === TRUE) {
        echo "Boek is uit de database verwijderd!";
                header("location: ../site/assortiment.php");

    } else {
        echo "Er is een fout opgetreden tijdens het verwijderen van het boek: " . $db->error;
    }
    print_r($currentId);
//    print_r($key);
//    print_r($boekendb);
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

