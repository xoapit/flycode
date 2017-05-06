<?php

$servername = "127.0.0.1:53268";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "dbblog";

    $conn = mysqli_connect(
        "{$ketnoi['host']}",
        "{$ketnoi['username']}",
        "{$ketnoi['password']}","{$ketnoi['dbname']}")
    or
        die("Cann't connect to database");
    mysqli_query($conn,"SET character_set_results=utf8");

?>