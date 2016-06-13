<?php
require_once "../includes/dbconnection.php";

//checks if information fields are filled in correctly
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

//if fields are filled in correctly, hash the password for database security
if ($ok) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    //check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //insert escape string, and insert email and hashed password into database
    $sql = "INSERT INTO accounts2 (email, password) VALUES ('$email', '$hash')";
    mysqli_real_escape_string($db, $email);
    mysqli_real_escape_string($db, $hash);
    //mysqli_real_escape_string($db, $username);

    //redirect user back to home.php is account creation is succesfull
    if (mysqli_query($db, $sql)) {
        echo "Uw account is succesvol aangemaakt!";
        header("location: ../site/home.php");
    } else {
        //show error if something went wrong.
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
