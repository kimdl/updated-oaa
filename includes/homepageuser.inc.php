<?php

    error_reporting(0);
    session_start();
    
    $id = $_SESSION["user"]; 
    
    $con=mysqli_connect("localhost","root","","oas");

    if(!isset($con)){
        die("Database Not Found");
    }
    
    $q=mysqli_query($con,"SELECT s_fname, s_lrn, fullname FROM t_user WHERE s_id='".$id."'");
    $n=  mysqli_fetch_assoc($q);
    $firstname= $n['s_fname'];
    $slrn= $n['s_lrn'];
    $full= $n['fullname'];

    $q0=mysqli_query($con,"SELECT s_name, s_email FROM t_user_data WHERE s_id='".$id."'");
    $n0=  mysqli_fetch_assoc($q0);
    $stname= $n0['s_name'];
    $seml= $n0['s_email'];

    $q1=mysqli_query($con,"SELECT s_intgrade, s_collegeOf, s_markedBy FROM t_usermark WHERE s_id='".$id."'");
    $n1=  mysqli_fetch_assoc($q1);
    $intrating= $n1['s_intgrade'];
    $intcourse= $n1['s_collegeOf'];
    $intby= $n1['s_markedBy'];

    $sta=mysqli_query($con,"SELECT s_stat FROM t_status WHERE s_id='".$id."'");
    $stat=  mysqli_fetch_assoc($sta);
    $stval= $stat['s_stat'];

    $q2=mysqli_query($con,"SELECT sched_id, syStart, syEnd FROM t_defaultschlyr WHERE id = '1' ");
    $n2=  mysqli_fetch_assoc($q2);
    $syId= $n2['sched_id'];
    $syS= $n2['syStart'];
    $syE= $n2['syEnd'];
    

    $picpath="studentpic/";
    $docpath="studentdoc/";
    $proofpath="studentproof/";
    if(isset($_REQUEST['updateDocs'])){
        $picpath=$picpath.$_FILES['fpic']['name'];
        $docpath1=$docpath.$_FILES['gm']['name'];     
        $docpath2=$docpath.$_FILES['bc']['name'];  
        $proofpath1=$proofpath.$_FILES['f137']['name']; 
        $proofpath2=$proofpath.$_FILES['sig']['name']; 
    
        if(move_uploaded_file($_FILES['fpic']['tmp_name'],$picpath)
            && move_uploaded_file($_FILES['gm']['tmp_name'],$docpath1)
            && move_uploaded_file($_FILES['bc']['tmp_name'],$docpath2)
            && move_uploaded_file($_FILES['f137']['tmp_name'],$proofpath1)
            && move_uploaded_file($_FILES['sig']['tmp_name'],$proofpath2))
            {
    
            $img=$_FILES['fpic']['name'];
            $img1=$_FILES['gm']['name'];
            $img2=$_FILES['bc']['name'];
            $img5=$_FILES['f137']['name'];
            $img6=$_FILES['sig']['name'];
    
            $sql="UPDATE t_userdoc SET
            s_pic= '$img', 
            s_goodMoral= '$img1', 
            s_birthCert = '$img2',
            s_f137 = '$img5',
            s_sigpic='$img6' 
            WHERE s_id='".$id."'";
    
            mysqli_query($con, $sql);
                
            echo "
            <script>alert(Requirements Updated.');
            window.location.replace('homepageuser.php');
            </script>";
            exit();
        }
        else
        {
            echo "<script>alert('Please update all documents.')
            window.location.replace('homepageuser.php');</script>";
        }
    }
    

    if(isset($_REQUEST["submitProfile"])){
        if (count($_POST) > 0) {
            $result = mysqli_query($con, "SELECT * FROM t_user_data WHERE s_id='" .$id. "'");
            $row = mysqli_fetch_array($result);
            if ($_POST["currentPassword"] == $row["s_pwd"]) {
                mysqli_query($con, "UPDATE t_user_data SET s_pwd='" . $_POST["newPassword"] . "' WHERE s_id='" . $id . "'");
                $message = "Password Changed.";
            } else
                $message = "Current Password is not correct. Please try again.";
        }
    }
?>