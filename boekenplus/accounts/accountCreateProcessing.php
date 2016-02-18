<?php
require_once "../includes/dbconnection.php";


if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['password']) || ($_POST ['password'] === '')) {
        $ok = false;
    } else {
        $password = $_POST['password'];
    }

    if (!isset($_POST['email']) || ($_POST ['email'] === '')) {
        $ok = false;

    } else {
        $email = $_POST['email'];
    }
}

if ($ok) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    //check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO accounts2 (email, password) VALUES ('$email', '$hash')";
    mysqli_real_escape_string($db, $email);
    mysqli_real_escape_string($db, $hash);
    //mysqli_real_escape_string($db, $username);


    if (mysqli_query($db, $sql)) {
        echo "UW account is succesvol aangemaakt!";
        header("location: ../site/home.php");
    } else {
        echo "Er ging iets fout bij het toevoegen van uw account. " . $db->error;
    }
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
