<?php    
    session_start();
    error_reporting(0);

    $unam = $_REQUEST["unam"];

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
    
    
    $con=mysqli_connect("localhost","root","","oas");
    
    if(!isset($con)){
        die("Database Not Found");
    }

    
    if(isset($_REQUEST["frmupdate"]))
    {
        $sql="update t_user set

        s_lrn='$slrn',

        s_lname='$lname', 
        s_fname='$fname', 
        s_mname='$mname', 

        s_gen='$gen', 
        s_relg='$relg', 
        s_Bday='$ubday', 
        s_Age='$uage', 
        s_civilStatus='$civilStatus', 
        s_placeOfBirth='$placeOfBirth', 
        s_citizenShip='$citizenShip', 
        s_citizenShipSpecify='$citizenShipSpecify', 

        s_hsName='$hsname', 
        s_hsAdd='$hsadd', 
        s_hsEM='$hsEM', 
        s_track='$track',
        s_strand='$strand',
        
        s_firstURSchoice='$firstURSchoice', 
        s_secondURSchoice='$secondURSchoice', 
        s_ifirstIC='$ifirstIC', 
        s_isecondIC='$isecondIC', 
        s_iifirstIC='$iifirstIC', 
        s_iisecondIC='$iisecondIC', 
        s_genAverage='$genAverage', 

        s_facultyChild='$facultyChild', 
        s_parentEmpName='$parentEmpName', 
        s_officeEmp='$officeEmp', 
        s_parentOfficeDesig='$parentOfficeDesig', 
        s_parentTelNo='$parentTelNo', 

        s_selfSup='$selfSup', 
        s_natureOfWork='$natureOfWork', 
        s_workSpecify='$workSpecify', 

        s_houseNum='$houseNum', 
        s_houseSt='$houseSt', 
        s_subd='$subd', 
        s_village='$village',
        s_brgy='$brgy', 
        s_cityTown='$cityTown', 
        s_province='$province', 
        s_postalCode='$postalCode',

        s_phoneNum='$phoneNum', 
        s_emailAddress='$emailAddress', 
        s_fbAccount='$fbAccount'


        where s_id='".$_SESSION['user']."'";

        $sql0="update t_userparentinfo set
       
        f_fname='$uffname', 
        f_mname='$ufmname', 
        f_lname='$uflname', 
        f_citizen='$ufcit', 
        f_ms='$ufms', 
        f_hea='$ufhea', 
        f_occ='$ufocc', 
        f_inc='$ufinc'

        m_fname='$umfname', 
        m_mname='$ummname',
        m_lname='$umlname',
        m_citizen='$umcit', 
        m_ms='$umms', 
        m_hea='$umhea', 
        m_occ='$umocc', 
        m_inc='$uminc', 

        lg_fname='$ulgfname', 
        lg_mname='$ulgmname',
        lg_lname='$ulglname',
        lg_citizen='$ulgcit', 
        lg_ms='$ulgms', 
        lg_hea='$ulghea', 
        lg_occ='$ulgocc', 
        lg_inc='$ulginc'
       
        where s_id='".$_SESSION['user']."'";

        

        $sql1="update t_user_data set s_name='$unam' where s_id='".$_SESSION['user']."'";
        mysqli_query($con, $sql);
        mysqli_query($con, $sql0);
        mysqli_query($con, $sql1);

        header('location: ../homepageuser.php');
        echo "<script type='text/javascript'>alert('Details Uploaded !!');</script>";
    }
        
    $q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."'");
    $n=  mysqli_fetch_assoc($q);
    $stname= $n['s_name'];

    
    $aid=mysqli_query($con,"select s_id from t_user_data where s_id='".$_SESSION['user']."';");
    $naid=  mysqli_fetch_assoc($aid);
    $applicantID= $naid['s_id'];