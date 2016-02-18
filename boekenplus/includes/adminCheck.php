<?php
if(!isset($_SESSION['email'])){
    header('location: ../accounts/login.php');
    exit;
}

?>
