<?php
    session_start();
    error_reporting(0);
    
    $detid=$_REQUEST["detid"];
    $slrn=$_REQUEST["slrn"];
    
    $lname=$_REQUEST["lname"];
    $fname=$_REQUEST["fname"];
    $mname=$_REQUEST["mname"];

    $gen=$_REQUEST["gen"];
    $relg=$_REQUEST["relg"];
    $ubday=$_REQUEST["ubday"];
    $uage=$_REQUEST["uage"];
    $civilStatus=$_REQUEST["civilStatus"];
    $placeOfBirth=$_REQUEST["placeOfBirth"];
    $citizenShip =$_REQUEST["citizenShip"];
    $citizenShipSpecify =$_REQUEST["citizenShipSpecify"];

    $hsname =$_REQUEST["hsname"];
    $hsadd =$_REQUEST["hsadd"];
    $hsEM=$_REQUEST["hsEM"];
    $track=$_REQUEST["track"];
    $strand=$_REQUEST["strand"];
    
    $firstURSchoice=$_REQUEST["firstURSchoice"];
    $ifirstIC=$_REQUEST["ifirstIC"];
    $isecondIC=$_REQUEST["isecondIC"];
    
    $secondURSchoice=$_REQUEST["secondURSchoice"];
    $iifirstIC=$_REQUEST["iifirstIC"];
    $iisecondIC=$_REQUEST["iisecondIC"];

    $genAverage=$_REQUEST["genAverage"];

    
    $facultyChild=$_REQUEST["facultyChild"];
    $parentEmpName=$_REQUEST["parentEmpName"];
    $officeEmp=$_REQUEST["officeEmp"];
    $parentOfficeDesig=$_REQUEST["parentOfficeDesig"];
    $parentTelNo=$_REQUEST["parentTelNo"];

    $selfSup=$_REQUEST["selfSup"];
    $natureOfWork=$_REQUEST["natureOfWork"];
    $workSpecify=$_REQUEST["workSpecify"];
    
    $houseNum=$_REQUEST["houseNum"];
    $houseSt=$_REQUEST["houseSt"];
    $subd=$_REQUEST["subd"];
    $village=$_REQUEST["village"];

    $brgy=$_REQUEST["brgy"];
    $cityTown=$_REQUEST["cityTown"];
    $province=$_REQUEST["province"];
    $postalCode=$_REQUEST["postalCode"];

    $phoneNum=$_REQUEST["phoneNum"];
    $emailAddress=$_REQUEST["emailAddress"];
    $fbAccount=$_REQUEST["fbAccount"];

    $uffname=$_REQUEST["uffname"];
    $ufmname=$_REQUEST["ufmname"];
    $uflname=$_REQUEST["uflname"];
    $ufcit=$_REQUEST["ufcit"];
    $ufms=$_REQUEST["ufms"];
    $ufhea=$_REQUEST["ufhea"];
    $ufocc=$_REQUEST["ufocc"];
    $ufinc=$_REQUEST["ufinc"];

    $umfname=$_REQUEST["umfname"];
    $ummname=$_REQUEST["ummname"];
    $umlname=$_REQUEST["umlname"];
    $umcit=$_REQUEST["umcit"];
    $umms=$_REQUEST["umms"];
    $umhea=$_REQUEST["umhea"];
    $umocc=$_REQUEST["umocc"];
    $uminc=$_REQUEST["uminc"];

    $ulgfname=$_REQUEST["ulgfname"];
    $ulgmname=$_REQUEST["ulgmname"];
    $ulglname=$_REQUEST["ulglname"];
    $ulgcit=$_REQUEST["ulgcit"];
    $ulgms=$_REQUEST["ulgms"];
    $ulghea=$_REQUEST["ulghea"];
    $ulgocc=$_REQUEST["ulgocc"];
    $ulginc=$_REQUEST["ulginc"];
    
    
    $con = mysqli_connect("localhost","root","","oas");
    
    if(!isset($con)){
        die("Database Not Found");
    }
    
    
    if(isset($_REQUEST["frmnext"])){
        if($detid== "")
        $detid = DetCode();
        $sql  = "INSERT INTO t_user VALUES(";
        $sql .= "'" . $detid . "',";
        $sql .= "'" . $_SESSION['user'] ."',";

        
        $sql .="'" .  $slrn . "',";

        $sql .="'" .  $lname . "',";
        $sql .="'" .  $fname . "',";
        $sql .="'" .  $mname . "',";
        
        $sql .= "'" . $gen . "',";
        $sql .= "'" . $relg . "',";
        $sql .= "'" . $ubday . "',";
        $sql .= "'" . $uage . "',";
        $sql .= "'" . $civilStatus . "',";
        $sql .= "'" . $placeOfBirth . "',";
        $sql .= "'" . $citizenShip . "',";
        $sql .= "'" . $citizenShipSpecify . "',";
        
        $sql .= "'" . $hsname . "',";
        $sql .= "'" . $hsadd . "',";
        $sql .= "'" . $hsEM . "',";
        $sql .= "'" . $track . "',";
        $sql .= "'" . $strand . "',";
        
        $sql .= "'" . $firstURSchoice . "',";
        $sql .= "'" . $secondURSchoice . "',";
        $sql .= "'" . $ifirstIC . "',";
        $sql .= "'" . $isecondIC . "',";
        $sql .= "'" . $iifirstIC . "',";
        $sql .= "'" . $iisecondIC . "',";
        $sql .= "'" . $genAverage . "',";

        $sql .= "'" . $facultyChild . "',";
        $sql .= "'" . $parentEmpName . "',";
        $sql .= "'" . $officeEmp . "',";
        $sql .= "'" . $parentOfficeDesig . "',";
        $sql .= "'" . $parentTelNo . "',";

        $sql .= "'" . $selfSup . "',";
        $sql .= "'" . $natureOfWork . "',";
        $sql .= "'" . $workSpecify . "',";

        $sql .= "'" . $houseNum . "',";
        $sql .= "'" . $houseSt . "',";
        $sql .= "'" . $subd . "',";
        $sql .= "'" . $village . "',";
        $sql .= "'" . $brgy . "',";
        $sql .= "'" . $cityTown . "',";
        $sql .= "'" . $province . "',";
        $sql .= "'" . $postalCode . "',";

        $sql .= "'" . $phoneNum . "',";
        $sql .= "'" . $emailAddress . "',";
        $sql .= "'" . $fbAccount . "',";
        $sql .= "'" . $fname ." ".$mname." ".$lname. "');";


      
        mysqli_query($con, $sql);


        $sql0  = "insert into t_userParentInfo values(";
        $sql0 .= "'" . $detid . "',";
        $sql0 .= "'" . $_SESSION['user'] ."',";

        $sql0 .= "'" . $uffname . "',";
        $sql0 .= "'" . $ufmname . "',";
        $sql0 .= "'" . $uflname . "',";
        $sql0 .= "'" . $ufcit . "',";
        $sql0 .= "'" . $ufms . "',";
        $sql0 .= "'" . $ufhea . "',";
        $sql0 .= "'" . $ufocc . "',";
        $sql0 .= "'" . $ufinc . "',";

        $sql0 .= "'" . $umfname . "',";
        $sql0 .= "'" . $ummname . "',";
        $sql0 .= "'" . $umlname . "',";
        $sql0 .= "'" . $umcit . "',";
        $sql0 .= "'" . $umms . "',";
        $sql0 .= "'" . $umhea . "',";
        $sql0 .= "'" . $umocc . "',";
        $sql0 .= "'" . $uminc . "',";

        $sql0 .= "'" . $ulgfname . "',";
        $sql0 .= "'" . $ulgmname . "',";
        $sql0 .= "'" . $ulglname . "',";
        $sql0 .= "'" . $ulgcit . "',";
        $sql0 .= "'" . $ulgms . "',";
        $sql0 .= "'" . $ulghea . "',";
        $sql0 .= "'" . $ulgocc . "',";
        $sql0 .= "'" . $ulginc . "');";
        mysqli_query($con, $sql0);

        $sql1  = "UPDATE t_status SET
        s_stat= 'Pending'
        WHERE s_id='".$_SESSION['user']."'";
        
        mysqli_query($con, $sql1);
         
        header('location: documents.php');
        echo "<script>alert('Details Uploaded !!');</script>";
    
    }
    function DetCode(){
      $con = mysqli_connect("localhost", "root", "", "oas");
      $rs  = mysqli_query($con,"select CONCAT('DE',LPAD(RIGHT(ifnull(max(s_detid),'DE00000000'),8) + 1,8,'0')) from t_user;");
      return mysqli_fetch_array($rs)[0];
    }

    $q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."';");
    $n=  mysqli_fetch_assoc($q);
    $stname= $n['s_name'];

    $aid=mysqli_query($con,"select s_id from t_user_data where s_id='".$_SESSION['user']."';");
    $naid=  mysqli_fetch_assoc($aid);
    $applicantID= $naid['s_id'];

    $q1=mysqli_query($con,"select s_dob from t_user_data where s_id='".$_SESSION['user']."';");
    $n1=  mysqli_fetch_assoc($q1);
    $stDateOfBirth= $n1['s_dob'];

    if (!isset($_SESSION['user'])){
        echo "<br><h2>You are not Logged On Please Login to Access this Page</div></h2>";
        echo "<a href=index.php><h3 align=center>Click Here to Login</h3></a>";
        exit();
    }

?>
