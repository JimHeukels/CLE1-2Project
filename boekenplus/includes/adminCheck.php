<?php
//the check used to see if an user is logged in or not. if user isn' logged in, but is trying to get to a page where an account is needed, he/she will be redirected to the login page
if(!isset($_SESSION['email'])){
    header('location: ../accounts/login.php');
    exit;
}

?>
