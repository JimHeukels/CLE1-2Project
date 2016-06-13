<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../includes/style1.css">
</head>
<body>

<?php
require_once('../includes/navigation.template.php')
?>

<div id="hmenu">
    <h1>Maak hier uw account aan</h1>
</div>

<!--account creating form is filled in on this page, information gets redirected to accountCreateProcessing for correct data handling-->
<div id=hmenu>
    <form action="accountCreateProcessing.php" method="post">

        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email"/>
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password"/>
        </div>

        <div>
            <input type="submit" name="submit" value="Maak account aan"/>
        </div>

    </form>

</body>
</html>
