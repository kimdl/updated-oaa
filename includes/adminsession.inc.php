<?php

if (!isset($_SESSION["ad"])){
    
    echo "<h1 style='color:#fff; text-align:center; margin-top:20%;'>You are not Logged In, Please Login to Access this Page</h1><br>";
    echo "<h2><a href='adminlogin.php'>Click Here to Login</a></h2>";
    exit();
}
