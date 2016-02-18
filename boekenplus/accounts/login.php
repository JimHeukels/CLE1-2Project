<?php
require_once "../includes/dbconnection.php";
session_start();

//checks is email and password are filled in
if (isset($_POST['email']) && (isset($_POST['password']))) {
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //escaping special chars to prevent coding inside the login form
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $sql = "select * from accounts2 where email='$email'";

//executing the slq query
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    //checks if all the data are in the variable $row
    if ($row) {
        $hash = $row['password'];
        $isAdmin = $row['admin'];
        $userId = $row['id'];

        //verifies the filled in password with the password database
        if (password_verify($_POST['password'], $hash)) {
            $message = 'Inloggen geslaagd';
            $_SESSION['email'] = $row['email'];
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['id'] = $row['id'];

            //if everything is filled in correctly, user gets send back to the homepage
            header("location: ../site/home.php");
            exit;

            //the following else statements will return an log in error if any of the requirementts isnt met correctly
        } else {
            echo "Inloggen mislukt";
        }
    } else {
        echo "Inloggen mislukt";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../includes/style2.css"/>
</head>
<body>
<div id="hmenu">
    <?php
    require_once('../includes/navigation.template.php')
    ?>
    <h1>Hier kunt u inloggen</h1>
</div>
<div id="hmenu">
    <form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">

        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email"/>
        </div>
        <br>
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password"/>
        </div>
        <br>
        <div>
            <input type="submit" name="submit" value="login"/>
        </div>
</div>
<br>
<div id="hmenu">
    <h3>Heeft u nog geen account?</h3>
    <h5> <a href="accountCreateForm.php" >klik hier om er een aan te maken </a></h5>
</div>
</form>
</body>
</html>

