<?php
require_once "../includes/dbconnection.php";
session_start();
$currentId = $_GET['id'];

//check connection
//if (!$db){
//    die("Connection failed: " . mysqli_connect_error());
//}

//Create query for db & fetch result
$queryAll = "SELECT * FROM boekendb";
$result = mysqli_query($db, $queryAll);

//Create array & store results from db
$boekendb = [];
while ($row = mysqli_fetch_assoc($result)) {
    $boekendb[] = $row;
}
//Close connection
mysqli_close($db);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../includes/style2.css"/>
</head>
<body>
<?php
require_once('../includes/navigation.template.php')
?>

<table>
    <thead>
    <tr>
        <th>Auteur</th>
        <th>titel</th>
        <th>Jaar van uitgave</th>
        <th>Genre</th>
        <th>Voorraad</th>
        <th>Pas boek aan</th>
    </tr>
    </thead>


    <?php foreach ($boekendb as $key => $boeken) {
        if ($currentId == $key) {
            ?>
                <form action="boekeditProcessing.php" method="post">
                    <tr>
                        <td>
                            <input type="hidden" name="id" value=" <?php echo $boeken ["id"]; ?>"/>
                            <label for="auteur"> Auteur</label>
                            <input type="text" id="auteur" name="auteur" value="<?php echo $boeken['auteur']; ?>"/></td>

                        <td><label for="titel"> Titel</label>
                            <input type="text" id="titel" name="titel" value="<?php echo $boeken['titel']; ?>"/></td>

                        <td><label for="jaar"> Jaar</label>
                            <input type="text" id="jaar" name="jaar" value="<?php echo $boeken['jaar']; ?>"/></td>

                        <td><label for="genre"> Genre </label>
                            <input type="text" id="genre" name="genre" value="<?php echo $boeken['genre']; ?>"/></td>

                        <td><label for="voorraad"> Voorraad</label>
                            <input type="text" id="voorraad" name="voorraad" value="<?php echo $boeken['voorraad']; ?>"/></td>

                        <td><input type="submit" name="submit" title="submit" value="submit"/></td>

                        <!-- <a href="boekdelete.php?id=<?= $boeken ["id"]; ?>">Verwijder boek</a> -->
                    </tr>
                </form>
        <?php };
    }; ?>
</table>
</body>
</html>
