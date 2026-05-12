<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db = "gyakorlat";

$connect = mysqli_connect($db_servername, $db_username, $db_password, $db);

if (!$connect) {
    die("Adatbazis kapcsolat sikertelen: " . mysqli_connect_error());
}

?>