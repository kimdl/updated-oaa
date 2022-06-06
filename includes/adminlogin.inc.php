<?php

    session_start();
    error_reporting(0);
    include 'dbh.inc.php';

    if(isset($_REQUEST["a_sub"])){
        $id=$_POST['a_id'];
        $apwd=$_POST['a_ps'];

        $q=mysqli_query($conn,"SELECT ad_id FROM t_admin WHERE ad_username='".$id."'");
        $n=  mysqli_fetch_assoc($q);
        $aid= $n['ad_id'];

        if($id != ''&& $apwd != ''){
            $query=mysqli_query($conn,"SELECT * FROM t_admin WHERE ad_id='".$aid."' AND ad_pswd='".$apwd."' AND ad_userlevel='ADMIN'");
            $res=mysqli_fetch_row($query);
        
            $query1=mysqli_query($conn,"SELECT * FROM t_admin WHERE ad_id='".$aid."' AND ad_pswd='".$apwd."' AND ad_userlevel='STAFF'");
            $res1=mysqli_fetch_row($query1);

            $query2=mysqli_query($conn,"SELECT * FROM t_admin WHERE ad_id='".$aid."' AND ad_pswd='".$apwd."' AND ad_userlevel='REGISTRAR OFFICER'");
            $res2=mysqli_fetch_row($query2);

            $query3=mysqli_query($conn,"SELECT * FROM t_admin WHERE ad_id='".$aid."' AND ad_pswd='".$apwd."' AND ad_userlevel='COORDINATOR'");
            $res3=mysqli_fetch_row($query3);

            if($res){
                $_SESSION["ad"] = $aid;
                header('Location: ../admin.php');
            }
            else if($res1){
                $_SESSION["ad"] = $aid;
                header('Location: ../staff.php');
            }
            else if($res2){
                $_SESSION["ad"] = $aid;
                header('Location: ../registrar.php');
            }
            else if($res3){
                $_SESSION["ad"] = $aid;
                header('Location: ../coordinator.php');
            }
            else{
                header('Location:../adminlogin.php?error=invalidlogin');
            }
        }
    
        else{
            header('Location:../adminlogin.php?error=empty');
        }
    }else{
        
        header("location: ../adminlogin.php");
        exit();
    }
  
?>