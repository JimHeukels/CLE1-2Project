<?php
require_once "../includes/dbconnection.php";
session_start();
if(!isset($_SESSION['email'])) {
    header("location: ../accounts/login.php");
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

    <?php
    require_once('../includes/navigation.template.php');
    $currentuserid = $_SESSION['id'];
?>

    <div id="hmenu">
        <h1>Reserveringen</h1>
        </div>
    <div id="hmenu">
        <br><br><br>
    <?php
//    check if logged in user is an admin. if the user is an admin, all reservations will be shown
    if (isset($_SESSION['email']) && ($_SESSION['admin']) == !0){
    $sql = "SELECT * FROM `reserveringen` JOIN boekendb bdb ON bdb.id = reserveringen.boekendb_id";

    //Create query for db & fetch result
    $result = mysqli_query($db, $sql);
    $data = mysqli_fetch_all($result);

    $reserveringen = [];
    //Close connection
    mysqli_close($db);


    ?>
    <table>
        <thead>
        <tr>
            <th>Reserverings Nummer</th>
            <th>Gereserveerd door</th>
            <th>Titel</th>
            <th>Auteur</th>
            <th>Genre</th>
            <th>Jaar van uitgave</th>
            <th>Reservering verwijderen</th>
        </tr>
        </thead>
        <tfoot>

        </tfoot>
        <tbody>
<!--        loop through database to get reservation data-->
        <?php foreach ($data as $reservations) {
            ?>
            <tr>
                <td><?php echo $reservations[0]; ?></td>
                <td><?php echo $reservations[1]; ?> </td>
                <td><?php echo $reservations[4]; ?></td>
                <td><?php echo $reservations[5]; ?></td>
                <td><?php echo $reservations[6]; ?></td>
                <td><?php echo $reservations[7]; ?></td>
                <td><a href="../reserveringen/reservationDelete.php?id=<?= $reservations[0];?>">Reservering verwijderen</a> </td>
            </tr>
            <?php
        };
        //  table keys:
        //  0:Reservation number
        //  1:Account id of the account that made the reservation
        //  2:ID van het gereserveerde boek
        //  3:ID van het gereserveerde boek
        //  4:The titel of the reserved book
        //  5:Author of the reserved book
        //  6:Genre of the reserved book
        //  7:Publishing date of the reserved book
        //  8:Reserved book's description
        //  9:Reserved book's image path in the database
        //  10:Stock of the reserved book

        //  11: NULL. There aren't any keys left after key #10

         ?>
        </tbody>
    </table>

<!--    if user is a normal user, only his/her personal reservations will be shown-->
    <?php } else if (isset($_SESSION['email']) && ($_SESSION['admin']) == 0){
    $sql = "SELECT * FROM `reserveringen` JOIN boekendb bdb ON bdb.id = reserveringen.boekendb_id WHERE reserveringen.accounts2_id = $currentuserid";

    //Create query for db & fetch result
    $result = mysqli_query($db, $sql);
    $data = mysqli_fetch_all($result);

    $reserveringen = [];
    //Close connection
    mysqli_close($db);

    ?>
    <table>
        <thead>
        <tr>
            <th>Reservatie nummer</th>
            <th>Account nummer</th>
            <th>Boek id</th>
            <th>Titel</th>
            <th>Auteur</th>
            <th>Genre</th>
            <th>Jaar van uitgave</th>
            <th>Reservering verwijderen</th>
        </tr>
        </thead>
        <tfoot>

        </tfoot>
        <tbody>
        <?php foreach ($data as $reservations) {
            ?>
            <tr>
                <td><?php echo $reservations[0]; ?></td>
                <td><?php echo $reservations[1]; ?> </td>
                <td><?php echo $reservations[2]; ?></td>
                <td><?php echo $reservations[4]; ?></td>
                <td><?php echo $reservations[5]; ?></td>
                <td><?php echo $reservations[6]; ?></td>
                <td><?php echo $reservations[7]; ?></td>
                <td><a href="../reserveringen/reservationDelete.php?id=<?= $reservations[0];?>">Reservering verwijderen</a> </td>
            </tr>
            <?php
        };
        //  table keys: see previous table keys comment on line 75

        } ?>
        </tbody>
    </table>

</body>
</html>

