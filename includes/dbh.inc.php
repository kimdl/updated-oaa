<?php

//information needed to connect to database
$servername ="localhost";

$dBUsername ="root";
$dBPassword = "";

//name of your database in phpmyadmin
$dBName = "oas";

//connection using mysqli(parameters)
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);


//check connection
if (!$conn) {
    die("Connection Failed: ". mysqli_connect_error());
}