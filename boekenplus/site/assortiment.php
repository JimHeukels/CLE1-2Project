<?php
require_once "../includes/dbconnection.php";
session_start();


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

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../includes/style2.css"/>
</head>
<body>
<?php
require_once('../includes/navigation.template.php')
?>

<div id="hmenu">
    <h1>Ons geweldige aanbod!</h1>
</div>

<div id="hmenu">

<!--    check if current logged in user is an admin or not-->
    <?php if (isset($_SESSION['admin'])){
    $admintoken = $_SESSION['admin'];
    if ($admintoken == !0) {?>
        <div>

<!--            if user is admin, add admin exclusive function to website navigation bar-->
            <?php if (isset($_SESSION['admin'])){
                $admintoken = $_SESSION['admin'];
                if ($admintoken == 1) {?>
                    <h3><a href="../assortimentManagement/boekadd.php"> Boek toevoegen </a></h3> <?php
                }}?>

<!--            load rest of the page-->
        </div>
<!--        table to show information from book database-->
        <table>
            <thead>
            <tr>
                <th>Boek ID</th>
                <th>Boek cover</th>
                <th>Auteur</th>
                <th>Boek titel</th>
                <th>Jaar van uitgave</th>
                <th>Genre</th>
                <th>Voorraad</th>
                <th>Boek verwijderen</th>
                <th>Boek details</th>
            </tr>

            </thead>



            <tbody>
<!--            code loops through the book database-->
            <?php foreach ($boekendb as $key => $boeken) { ?>
                <tr>
                    <td><?php echo $boeken ["id"]; ?></td>
                    <td><a href="details.php?id=<?= $boeken['id']; ?>"><img src="<?php echo $boeken['cover']; ?>"></a></td>
                    <td><?php echo $boeken['auteur']; ?></td>
                    <td><?php echo $boeken['titel']; ?></td>
                    <td><?php echo $boeken['jaar']; ?></td>
                    <td><?php echo $boeken['genre']; ?></td>
                    <td><?php echo $boeken['voorraad']; ?></td>
<!--                    admins have the right to remove books, link gets added here-->
                    <td><a href="../assortimentManagement/boekdelete.php?id=<?= $boeken['id']; ?>">Boek verwijderen</a></td>
                    <td><a href="details.php?id=<?= $key; ?>">Details pagina</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    <?php }}

//    check is logged in user is a regular user
    if (isset($_SESSION['admin'])){
        $admintoken = $_SESSION['admin'];
        if ($admintoken == 0){ ?>

<!--    table to show data from book database-->
    <table>
        <thead>
        <tr>
            <th>Boek ID</th>
            <th>Boek cover</th>
            <th>Auteur</th>
            <th>Boek titel</th>
            <th>Jaar van uitgave</th>
            <th>Genre</th>
            <th>Voorraad status</th>
            <th>Boek details</th>
        </tr>
        </thead>


        <tbody>
<!--        code loops through the book database-->
        <?php foreach ($boekendb as $key => $boeken) { ?>
        <tr>
            <td><?php echo $boeken ["id"]; ?></td>
            <td><a href="details.php?id=<?= $boeken['id']; ?>"><img src="<?php echo $boeken['cover']; ?>"></a></td>
            <td><?php echo $boeken['auteur']; ?></td>
            <td><?php echo $boeken['titel']; ?></td>
            <td><?php echo $boeken['jaar']; ?></td>
            <td><?php echo $boeken['genre']; ?></td>
            <td><?php echo $boeken['voorraad']; ?></td>
            <td><a href="details.php?id=<?= $key; ?>">Details page</a></td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>

</body>
</html>

<?php }
        }
//if noone is logged in, load page for regular users
    else { ?>
    <table>
        <thead>
        <tr>
            <th>Boek ID</th>
            <th>Boek cover</th>
            <th>Auteur</th>
            <th>Boek titel</th>
            <th>Jaar van uitgave</th>
            <th>Genre</th>
            <th>Voorraad status</th>
            <th>Boek details</th>
        </tr>
        </thead>


        <tbody>
<!--        code loops through the book database-->
        <?php foreach ($boekendb as $key => $boeken) { ?>
            <tr>
                <td><?php echo $boeken ["id"]; ?></td>
                <td><a href="details.php?id=<?= $boeken['id']; ?>"><img src="<?php echo $boeken['cover']; ?>"></a></td>
                <td><?php echo $boeken['auteur']; ?></td>
                <td><?php echo $boeken['titel']; ?></td>
                <td><?php echo $boeken['jaar']; ?></td>
                <td><?php echo $boeken['genre']; ?></td>
                <td><?php echo $boeken['voorraad']; ?></td>
                <td><a href="details.php?id=<?= $key; ?>">Details page</a></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

</div>



</body>
</html>

<?php } ?>
