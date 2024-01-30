<?php

// $serverName = "localhost";
// $dBUsername = "root";
// $dBPassword = "";
// $dBName = "user";

$conn = mysqli_connect("localhost", "root","", "moodle_project");

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }