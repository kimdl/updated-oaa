<?php

function emptyInputSignup($username, $in_dob, $email, $pwd, $pwdRepeat, $captcha){
    $result;
    if (empty($username) ||empty($in_dob) || empty($email) || empty($pwd) || empty($pwdRepeat) || empty($captcha)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {

    $sql = "SELECT * FROM t_user_data WHERE s_name = ? OR s_email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}



function createUser($conn, $stid, $pwd, $in_dob, $username, $email){
    if($stid == "")
    $stid = StudentCode();
    $sql  = "INSERT INTO t_user_data VALUES(";
    $sql .= "'" . $stid . "',";
    $sql .= "'" . $pwd . "',";
    $sql .= "'" . $in_dob . "',";
    $sql .= "'" . $username . "',";
    $sql .= "'" . $email . "',";
    $sql .= "sysdate())";
    /* $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); */
    $sid = $stid;
    mysqli_query($conn, $sql);

    $sql1  = "INSERT INTO t_status VALUES(";
    $sql1 .= "'" . $sid . "',";
    $sql1 .= "'Applied');";
    mysqli_query($conn, $sql1);

    header("Location: ../signup.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd){
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
/* function loginUser($conn, $username, $pwd){
        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["s_pwd"];

    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["s_id"];
        $_SESSION["useruid"] = $uidExists["s_name"];
        header("location: ../admsnform.php");
        exit();
    }
} */
/* function loginUser($conn, $username, $pwd){

    $query=mysqli_query($conn ,"SELECT * FROM t_userdata WHERE s_id='". $id ."' AND s_pwd='".$pwd."'");
    $res=mysqli_fetch_row($query);

    $query1=mysqli_query($conn ,"SELECT * FROM t_user WHERE s_id='". $id ."'");
    $res1=mysqli_fetch_row($query1);

    if ($res){
        $_SESSION["user"] = $id;
        header('Location: ../admsnform.php');
        exit();
    }
    if ($res && $res1){
        $_SESSION["user"] = $id;
        header('Location: ../homepageuser.php');
        exit();
    }
}
 */
function StudentCode(){
    $con = mysqli_connect("localhost", "root", "", "oas");
    $rs  = mysqli_query($con,"SELECT CONCAT('AURS',LPAD(RIGHT(ifnull(max(s_id),'AURS00000'),5) + 1,5,'0')) from t_user_data;");
    return mysqli_fetch_array($rs)[0];
  }

function StudentPsw(){
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;

    for($i=0;$i<8;$i++){
        $n=rand(0,$alphaLength);
        $pass[]=$alphabet[$n];
    }
    return implode($pass);
}