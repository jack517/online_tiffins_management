<?php
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_database="fb";
$connection = new mysqli($db_hostname,$db_username,$db_password,$db_database);

if($connection->connect_error) die($connection->connect_error);
?>