<?php

if (!isset($_SESSION["user"])){
    
    echo "<h1 style='color:#000; text-align:center; margin-top:20%;'>You are not Logged In, Please Login to Access this Page</h1><br>";
    echo "<h2 style='color:#000; text-align:center;'><a href='login.php'>Click Here to Login</a></h2>";
    exit();
}