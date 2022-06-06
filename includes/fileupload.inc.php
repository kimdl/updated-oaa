
<?php
session_start();
$sp=mysqli_connect("localhost","root","","oas");
    if($sp->connect_errno){
    echo "Error <br/>".$sp->error;
}

$picpath="studentpic/";
$docpath="studentdoc/";
$proofpath="studentproof/";

$id=$_SESSION['user'];
if(isset($_POST['fpicup'])){
    $picpath=$picpath.$_FILES['fpic']['name'];
    $docpath1=$docpath.$_FILES['fgm']['name'];     
    $docpath2=$docpath.$_FILES['fbc']['name'];  
    $proofpath1=$proofpath.$_FILES['ff137']['name']; 
    $proofpath2=$proofpath.$_FILES['fsig']['name']; 

    if(move_uploaded_file($_FILES['fpic']['tmp_name'],$picpath)
        && move_uploaded_file($_FILES['fgm']['tmp_name'],$docpath1)
        && move_uploaded_file($_FILES['fbc']['tmp_name'],$docpath2)
        && move_uploaded_file($_FILES['ff137']['tmp_name'],$proofpath1)
        && move_uploaded_file($_FILES['fsig']['tmp_name'],$proofpath2))
        {

        $img=$_FILES['fpic']['name'];
        $img1=$_FILES['fgm']['name'];
        $img2=$_FILES['fbc']['name'];
        $img5=$_FILES['ff137']['name'];
        $img6=$_FILES['fsig']['name'];


        $query="INSERT into t_userdoc (s_id, s_pic, s_goodMoral, s_birthCert, s_f137, s_sigpic) 
        values ('$id','$img','$img1','$img2','$img5','$img6');";

            if($sp->query($query)){
                header ('location: admsnreport.php');
                                  
            }
            else{
            echo "Error, ".$sp->error; 
            }
        }
        else
        {
            echo "<script>alert('There is an error, please retry or check agreement.')</script>";
        }
    }

?>
