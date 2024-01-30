<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ergasia";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }