<?php


if(isset($_REQUEST["in_sub"])){
        
    extract($_POST);
    $stid=$_REQUEST["stid"];
    $username=$_REQUEST["username"];
    $in_dob=$_REQUEST["in_dob"];
    $email=$_REQUEST["email"];
    $pwd=$_REQUEST["pwd"];
    $pwdrepeat=$_REQUEST["pwdRepeat"];
    $captcha=$_REQUEST["captcha"];

    require 'dbh.inc.php'; 
    require 'functions.inc.php'; 
    
    if (emptyInputSignup($username, $in_dob, $email, $pwd, $pwdRepeat, $captcha) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $stid, $pwd, $in_dob, $username, $email);
}
else {
    header("Location: ../signup.php");
    exit();
}

