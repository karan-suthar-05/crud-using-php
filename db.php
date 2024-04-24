<?php

$servername = "localhost";
$user = "root";
$pass = "";
$db = "cruddata";

$conn = mysqli_connect($servername, $user, $pass, $db);
if(!$conn)
{
    echo "fail to connect ".mysqli_connect_error();
    die();
}
?>