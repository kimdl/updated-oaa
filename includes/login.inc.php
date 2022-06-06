<?php
$con=mysqli_connect("localhost","root","","oas");
if(!isset($con)){
    die("Database Not Found");
}

if(isset($_REQUEST["u_sub"])){

    $idd = $_POST['u_id'];
    $pwd = $_POST['u_ps'];

    $q=mysqli_query($con,"SELECT s_id FROM t_user_data WHERE s_name='".$idd."'");
    $n=  mysqli_fetch_assoc($q);
    $id= $n['s_id'];
    if($idd !='' && $pwd !=''){
        
        $query=mysqli_query($con ,"SELECT * from t_user_data where s_id='".$id."'  AND s_pwd='".$pwd."'");
        $res=mysqli_fetch_row($query);

        $query1=mysqli_query($con ,"SELECT * from t_user where s_id='".$id."'");
        $res1=mysqli_fetch_row($query1);

        if($res){
            $_SESSION['user']= $id;
            header('location: ../admsnform.php');
        }
        else if(($res) && ($res1)){
            $_SESSION['user']= $id;
            header('location: ../homepageuser.php');
        }
        else {
        header('location: ../login.php?error=wronglogin');
        }

    }
    else{
        header('location: ../login.php?error=emptyinput');
        exit();
    }
}

