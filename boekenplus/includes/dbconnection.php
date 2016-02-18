<?php
//Credentials
$host = 'sql.hosted.hro.nl';
$user = '0890829';
$password = 'looquaep';
$database = '0890829';


//Credentials
//$host = '"http://sql.hosted.hro.nl/"';
//$user = '0890829';
//$password = 'looquaep';
//$database = '0890829';

//Create connection
$db = mysqli_connect($host, $user, $password, $database) or die("Error: " . mysqli_connect_error());


?>
