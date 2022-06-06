<?php
    error_reporting(0);
    session_start();
    
    $con=mysqli_connect("localhost","root","","oas");
    
        $txtid=$_REQUEST["txtid"];
        $txtname=$_REQUEST["txtname"];
        $txtnameuid=$_REQUEST["txtnameuid"];
        $txteml=$_REQUEST["txteml"];
        $txtuserlevel=$_REQUEST["txtuserlevel"];
        
        $intrvwof=$_REQUEST["intrvwof"];
        $intname=$_REQUEST["intname"];
        $txtcourse=$_REQUEST["txtcourse"];
        $txtintrvwGrd=$_REQUEST["txtintrvwGrd"];
        
        $schlyearcode=$_REQUEST["schlyearcode"];
        $txtschedid=$_REQUEST["txtschedid"];
        $schlyrstart=$_REQUEST["schlyrstart"];
        $schlyrend=$_REQUEST["schlyrend"];

        $admsncode=$_REQUEST["admsncode"];
        $txtsid1=$_REQUEST["txtsid1"];
        $txtsid=$_REQUEST["txtsid"];
        $a_fillingStart=$_REQUEST["a_fillingStart"];
        $a_fillingEnd=$_REQUEST["a_fillingEnd"];

        $reqcode=$_REQUEST["reqcode"];
        
        $txtsid=$_REQUEST["txtsid"];
        $r_dayNum=$_REQUEST["r_dayNum"];
        $r_dDate=$_REQUEST["r_dDate"];
        $r_appLimit=$_REQUEST["r_appLimit"];

        $ursatDay=$_REQUEST["ursatDay"];
        $ursatRoom=$_REQUEST["ursatRoom"];
        $examDayLimit=$_REQUEST["examDayLimit"];
        $examCampus=$_REQUEST["examCampus"];
        $examDayNum=$_REQUEST["examDayNum"];
        $examDate=$_REQUEST["examDate"];

        $examDayAssigned=$_REQUEST["examDayAssigned"];
        $examRoomNum=$_REQUEST["examRoomNum"];
        $examRoomName=$_REQUEST["examRoomName"];    
        $examRoomTime=$_REQUEST["examRoomTime"];
        $examCourseRoom=$_REQUEST["examCourseRoom"];

        $resdate=$_REQUEST["resdate"];
        $rescode=$_REQUEST["rescode"];

        $syCode=$_REQUEST["syCode"];
        $yearselected=$_REQUEST["yearselected"];

        $adid = $_SESSION["ad"]; 

        $q=mysqli_query($con,"SELECT ad_name, ad_username, ad_eml, ad_userlevel FROM t_admin where ad_id='".$adid."'");
        $n=  mysqli_fetch_assoc($q);
        $adname= $n['ad_name'];
        $aduid= $n['ad_username'];
        $ademl= $n['ad_eml'];
        $adul= $n['ad_userlevel'];


        $q1=mysqli_query($con,"SELECT s_name FROM t_user_data where s_id='".$intrvwof."'");
        $n1=  mysqli_fetch_assoc($q1);
        $sname= $n1['s_name'];


    /* schedule display */
    $q2=mysqli_query($con,"SELECT sched_id, syStart, syEnd FROM t_defaultschlyr WHERE id = '1' ");
    $n2=  mysqli_fetch_assoc($q2);
    $syId= $n2['sched_id'];
    $syS= $n2['syStart'];
    $syE= $n2['syEnd'];

    $q3=mysqli_query($con,"SELECT sched_id, fillingStart, fillingEnd FROM t_filling WHERE sched_id='$syId' ");
    $n3=  mysqli_fetch_assoc($q3);
    $adId= $n3['sched_id'];
    $adS= $n3['fillingStart'];
    $adE= $n3['fillingEnd'];

    $adStart = strtotime($adS);
    $adEnd = strtotime($adE);

    if (count($_POST) > 0) {
        $result = mysqli_query($con, "SELECT * FROM t_admin WHERE ad_id='" .$adid. "'");
        $row = mysqli_fetch_array($result);
        if ($_POST["currentPassword"] == $row["ad_pswd"]) {
            mysqli_query($con, "UPDATE t_admin SET ad_pswd='" . $_POST["newPassword"] . "' WHERE ad_id='" . $adid . "'");
            $message = "Password Changed.";
        } else
            $message = "Current Password is not correct. Please try again.";
    }

    if($_REQUEST["srchk"]!=""){
        $id = $_REQUEST["srchk"];
        $ra = mysqli_query($con, "SELECT s_name FROM t_user_data WHERE s_id = '$id' ");
        echo mysqli_fetch_array($ra)[0];
        die();
    }
    if($_REQUEST["srchk1"]!=""){
        $id1 = $_REQUEST["srchk1"];
        $ra1 = mysqli_query($con, "SELECT s_course FROM t_usermark WHERE s_id = '$id1'");
        echo mysqli_fetch_array($ra1)[0];
        die();
    }
    if(!isset($con)){
        die("Database Not Found");
    }

    
    if(isset($_REQUEST["schedcreate"])){
        if (emptyInputSy($schlyrstart, $schlyrend) !== false) {
            header("location: admin.php?error=emptyinputSY");
            exit();
        }   
        if (syExists($con, $schlyrstart, $schlyrend) !== false) {
            header("location: admin.php?error=syExist");
            exit();
        }
        if($txtschedid == "")
        $txtschedid = scheduleCode();
        $sql  = "INSERT into t_schlyr values(";
        $sql .= "'" . $txtschedid . "',";
        
        $sql .= "'" . $schlyrstart . "',";
        $sql .= "'" . $schlyrend . "')";

        mysqli_query($con, $sql);
        echo "<script>alert('School Year ".$schlyrstart." - ".$schlyrend." Added.');
        window.location.replace('admin.php');
        </script>";
        exit();
    }
    if(isset($_REQUEST["setSY"])){
        if($txtschedid == "")
        
        $q2=mysqli_query($con,"SELECT sched_id, syStart, syEnd FROM t_schlyr WHERE syStart='".$schlyrstart."' OR sched_id='".$schlyearcode."'");
        $n2=  mysqli_fetch_assoc($q2);
        $txtschedid= $n2['sched_id'];
        $dsyStart= $n2['syStart'];
        $dsyEnd= $n2['syEnd'];

        $sql  = "INSERT INTO t_defaultschlyr VALUES(";
        
        $sql .= "' 1 ',";
        $sql .= "'" . $txtschedid . "',";
        $sql .= "'" . $dsyStart . "',";
        $sql .= "'" . $dsyEnd . "')";


        $sql1 = "UPDATE t_defaultschlyr SET 
        sched_id = '$txtschedid', 
        syStart = '$dsyStart', 
        syEnd = '$dsyEnd'
        WHERE id='1'";
        
        mysqli_query($con, $sql);
        mysqli_query($con, $sql1);
        echo "<script>alert('School Year ".$dsyStart." - ".$dsyEnd." Set as the Default School Year.');
        window.location.replace('admin.php');
        </script>";
        exit();
    }
    if(isset($_REQUEST["scheddelete"])){
        $sql = "DELETE FROM t_schlyr WHERE sched_id='".$schlyearcode."'";

        $q1=mysqli_query($con,"SELECT syStart, syEnd FROM t_schlyr WHERE sched_id='".$schlyearcode."'");
        $n1=  mysqli_fetch_assoc($q1);
        $s= $n1['syStart'];
        $e= $n1['syEnd'];

        mysqli_query($con, $sql);
        echo "<script>alert('School Year ".$s. " - ".$e." Deleted.');
        window.location.replace('admin.php');
        </script>";
        exit();
    }
    if(isset($_REQUEST["schededit"])){

        $q=mysqli_query($con,"SELECT syStart, syEnd FROM t_schlyr WHERE sched_id='".$schlyearcode."'");
        $n=  mysqli_fetch_assoc($q);
        $ss= $n['syStart'];
        $se= $n['syEnd'];

    }

    if(isset($_REQUEST["schedFillingCreate"])){
        if (emptyInputAd($a_fillingStart, $a_fillingEnd) !== false) {
            echo "<script>alert('Please make sure to fill in Admission Start and End.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }   

        if($txtsid == "")
        $txtsid1 = fillingCode();

        $q2=mysqli_query($con,"SELECT sched_id FROM t_defaultschlyr");
        $n2=  mysqli_fetch_assoc($q2);
        $txtsid= $n2['sched_id'];

        if (adExists($con, $txtsid) !== false) {
            echo "<script>alert('There is Admission Date for this school year already.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }
        $sql  = "INSERT INTO t_filling VALUES(";
        
        $sql .= "'" .$txtsid1 ."',";
        $sql .= "'" . $txtsid . "',";
        
        $sql .= "'" . $a_fillingStart . "',";
        $sql .= "'" . $a_fillingEnd . "')";

        mysqli_query($con, $sql);
        header("Location: admin.php?success=adCreated");
        exit();
    }
    if(isset($_REQUEST["schedFillingDelete"])){
        $sql = "DELETE FROM t_filling WHERE fillingId='".$admsncode."'";

        $q1=mysqli_query($con,"SELECT fillingId FROM t_filling where fillingId='".$admsncode."'");
        $n1=  mysqli_fetch_assoc($q1);
        $fill= $n1['fillingId'];

        mysqli_query($con, $sql);
        echo "<script>alert('Admission ".$fill. "Deleted.');
        window.location.replace('admin.php');
        </script>";
        exit();
    }   
    if(isset($_REQUEST["schedFillingEdit"])){
        $adcheck=mysqli_query($con,"SELECT * FROM t_filling WHERE fillingId='$admsncode'");
        if (mysqli_num_rows($adcheck)>0){
            
            $q4=mysqli_query($con,"SELECT fillingId FROM t_filling WHERE fillingId='".$admsncode."'");
            $n4=  mysqli_fetch_assoc($q4);
            $schedid2= $n4['sched_id'];
    
            $sql = "UPDATE t_filling SET 
            fillingStart='$a_fillingStart', 
            fillingEnd='$a_fillingEnd'
            WHERE sched_id='".$schedid2."'";
       
            mysqli_query($con, $sql);
            header("Location: admin.php?success=adUpdated");
        }
        else {
            echo "<script>";
            echo "ADMISSION DATE not found";
            echo "<script>";
        }
    }

    if(isset($_REQUEST["schedReqCreate"])){
        
        if (emptyInputHC($r_dDate, $r_appLimit) !== false) {
            echo "<script>alert('Please make sure to fill in Hard Copy Date and Limit.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }   
        if($txtsid == "")

        $q2=mysqli_query($con,"SELECT sched_id FROM t_defaultschlyr");
        $n2=  mysqli_fetch_assoc($q2);
        $txtschedid= $n2['sched_id'];
                
        if (hcExists($con, $txtschedid, $r_dayNum) !== false) {
            echo "<script>alert('There is ".$r_dayNum." for this school year already. Please choose another day.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }

        $sql  = "INSERT INTO t_reqPassing VALUES(";
        $sql .= "'" . $txtsid . "',";
        $sql .= "'" . $txtschedid . "',";
        
        $sql .= "'" . $r_dayNum . "',";
        $sql .= "'" . $r_dDate . "',";
        $sql .= "'" . $r_appLimit . "')";

        mysqli_query($con, $sql);
        header("Location: admin.php?success=reqDaySet");
        exit();
    }
    if(isset($_REQUEST["schedReqDelete"])){
        $sql = "DELETE FROM t_reqPassing WHERE id='".$reqcode."'";

        $q1=mysqli_query($con,"SELECT sched_id, rdayNum FROM t_reqPassing WHERE id='".$reqcode."'");
        $n1=  mysqli_fetch_assoc($q1);
        $s= $n1['sched_id'];
        $r= $n1['rdayNum'];

        mysqli_query($con, $sql);

        echo "<script>alert('Requirement ".$r." school year ".$s." is Deleted.');
        window.location.replace('admin.php');
        </script>";
        exit();
    }
    if(isset($_REQUEST["schedReqEdit"])){
        $sql = "UPDATE FROM t_reqPassing WHERE id='".$reqcode."'";

        mysqli_query($con, $sql);
        header("Location: admin.php?success=reqDayUpdated");
        exit();
    }
    

    if(isset($_REQUEST["examDayCreate"])){
        if (emptyInputExamDay($examDayLimit, $examCampus, $examDayNum, $examDate) !== false) {
            echo "<script>alert('Please make sure to fill in all fields required for creating URSAT day.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }   

        if($txtsid == "")
        $txtsid = ursatCode();

        $q2=mysqli_query($con,"SELECT sched_id FROM t_defaultschlyr");
        $n2=  mysqli_fetch_assoc($q2);
        $txtschedid= $n2['sched_id'];
                    
        if (examDayExists($con, $txtschedid, $examDayNum, $examCampus) !== false) {
            echo "<script>alert('There is ".$examDayNum." for this school year already. Please set date to another day.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }

        $sql  = "INSERT INTO t_ursatday VALUES(";
        $sql .= "'" . $txtsid . "',";
        $sql .= "'" . $txtschedid . "',";

        $sql .= "'" . $examDayLimit . "',";
        $sql .= "'" . $examCampus . "',";
        $sql .= "'" . $examDayNum . "',";
        $sql .= "'" . $examDate . "')";        

        mysqli_query($con, $sql);
        header("Location: admin.php?success=ursatDaySet");
        exit();
    }
    if(isset($_REQUEST["examRoomCreate"])){

        if (emptyInputExamRoom($examDayNum, $examCourseRoom, $examRoomNum, $examRoomName, $examRoomTime) !== false) {
            echo "<script>alert('Please make sure to fill in all fields required for creating URSAT room. Including Day Number.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }   

        if($txtsid == "")
        
        $txtsid = ursatroomCode();

        $q=mysqli_query($con,"SELECT syStart, syEnd, sched_id FROM t_defaultschlyr");
        $n=  mysqli_fetch_assoc($q);
        $txtschedid= $n['sched_id'];
        $s= $n['syStart'];
        $e= $n['syEnd'];
        
        if (examRoomExists($con, $examDayNum, $examRoomNum, $txtschedid) !== false) {
            
            echo "<script>alert('There is ".$examRoomNum." for ".$examDayNum." for the school year of ".$s."-".$e." already. Please choose another room or day number.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }
        $sql  = "INSERT INTO t_ursatroom VALUES(";
        $sql .= "'" . $txtsid . "',";
        $sql .= "'" . $txtschedid . "',";
        
        $sql .= "'" . $examDayNum . "',";        
        $sql .= "'" . $examCourseRoom . "',";
        $sql .= "'" . $examRoomNum . "',";
        $sql .= "'" . $examRoomName . "',";
        $sql .= "'" . $examRoomTime . "')";        

        mysqli_query($con, $sql);
        header("Location: admin.php?success=ursatRoomSet");
        exit();
    }
    if(isset($_REQUEST["eescheddelete"])){

        if (emptyURSATDel($ursatDay, $ursatRoom) !== false) {
            echo "<script>alert('Select Day Code or Room Code that you want to delete.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }
        if ($ursatRoom == "") {
            
            $sql = "DELETE FROM t_ursatday WHERE ursat_id='".$ursatDay."'";
            mysqli_query($con, $sql);
            echo "<script>alert('Day ".$ursatDay." Deleted.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }
        else if ($ursatDay ==  "") {
            $sql1 = "DELETE FROM t_ursatroom WHERE ursat_id ='".$ursatRoom."'"; 
            mysqli_query($con, $sql1);
            echo "<script>alert('Room ".$ursatRoom." Deleted.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }
        else{
            
        header("Location: admin.php?error=somethinWentWrong");
        }
     
    }
    if(isset($_REQUEST["eeschededit"])){
        $sql = "DELETE FROM t_ursatday WHERE eDayNum='".$ursatID."'";

        mysqli_query($con, $sql);
        header("Location: admin.php?success=ursatDeleted");
    }

        
    if(isset($_REQUEST["rescreate"])){
        if (emptyInputRes($resdate) !== false) {
            echo "<script>alert('Please Select Date.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }   
        if($txtsid == "")

        $q2=mysqli_query($con,"SELECT sched_id FROM t_defaultschlyr");
        $n2=  mysqli_fetch_assoc($q2);
        $txtsid= $n2['sched_id'];

        if (resExists($con, $txtsid) !== false) {
            echo "<script>alert('There is Result Date for this School Year already.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }
        $sql  = "INSERT INTO t_exam_result VALUES(";
        $sql .= "'" . $txtsid . "',";
        $sql .= "'" . $resdate . "')";

        mysqli_query($con, $sql);
        header("Location: admin.php?success=resultAdded");
        exit();
    }
    if(isset($_REQUEST["resdelete"])){
        $sql = "DELETE FROM t_exam_result WHERE sched_id='".$rescode."'";

        mysqli_query($con, $sql);
        
        header("Location: admin.php?success=resultDeleted");
        exit();
    }

    $sigpath="adminsig/";
    if(isset($_REQUEST["admcreate"])){
        if (adminemptyInputSignup($txtname, $txtnameuid, $txteml, $txtuserlevel) !== false) {
            echo "<script>alert('Filling out all fields is required in making another officer.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }   
        if (adminuidExists($con, $txtnameuid, $txteml) !== false) {
            echo "<script>alert('Username taken. Please try again.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }

        if($txtid == ""){
        $txtid = AdminCode();
        }
        if($txtpwd == ""){
        $txtpwd = AdminPass();
        }
        if ($txtuserlevel == "COORDINATOR" || $txtuserlevel == "ADMIN") {
            $sigpath=$sigpath.$_FILES['txtcoorsig']['name'];
            if(move_uploaded_file($_FILES['txtcoorsig']['tmp_name'],$sigpath))
            {
                $img=$_FILES['txtcoorsig']['name'];
                $sql  = "INSERT INTO t_admin(ad_id, ad_name, ad_username, ad_pswd, ad_eml, ad_userlevel,ad_sig,ad_stat) values(";
                $sql .= "'" . $txtid . "',";
                $sql .= "'" . $txtname . "',";
                $sql .= "'" . $txtnameuid . "',";
                $sql .= "'" . $txtpwd . "',";
                $sql .= "'" . $txteml . "',";
                $sql .= "'" . $txtuserlevel . "',";
                $sql .= "'". $img ."',";
                $sql .= "'Active')";
                mysqli_query($con, $sql);

                echo "<script>alert('Your ID is ".$txtid." Password is: ".$txtpwd."');
                        window.location.replace('admin.php');
                        </script>";
                exit();
            }
            else{
                echo "<script>alert('There is an error inserting signature, please retry.')</script>";
            }
        }
        $sql  = "INSERT INTO t_admin(ad_id, ad_name, ad_username, ad_pswd, ad_eml, ad_userlevel,ad_sig,ad_stat) VALUES(";
        $sql .= "'" . $txtid . "',";
        $sql .= "'" . $txtname . "',";
        $sql .= "'" . $txtnameuid . "',";
        $sql .= "'" . $txtpwd . "',";
        $sql .= "'" . $txteml . "',";
        $sql .= "'" . $txtuserlevel . "',";
        $sql .= "'NA',";
        $sql .= "'Active')";

        mysqli_query($con, $sql);

        echo "<script>alert('Your ID is ".$txtid." Password is: ".$txtpwd."');
                window.location.replace('admin.php');
                </script>";
        exit();
        
    }
    if(isset($_REQUEST["admdelete"])){
        if (adminemptyInputDel($txtnameuid) !== false) {
            echo "<script>alert('Please write the username of the officer you want to Deactivate.');
            window.location.replace('admin.php');
            </script>";
            exit();
        }   
        if($txtid == "")
        $sql  = "UPDATE t_admin SET ad_stat=";
        $sql .= "'Inactivate'";
        $sql .= " WHERE ad_username='".$txtnameuid."'";

        $q1=mysqli_query($con,"SELECT ad_name FROM t_admin where ad_username='".$txtnameuid."'");
        $n1=  mysqli_fetch_assoc($q1);
        $adminname= $n1['ad_name'];
        
        mysqli_query($con, $sql);

        echo "<script>alert('Officer ".$adminname. " is Deactivated.');
        window.location.replace('admin.php');
        </script>";
        exit();
    }

    if(isset($_REQUEST["submitInt"])){
        if (emptyInputMarks($txtcourse, $txtintrvwGrd) !== false) {
            header("location: admin.php?error=emptyinputMarks");
            exit();
        }   
        if (intExists($con, $intrvwof) !== false) {
            header("location: admin.php?error=interviewGradedAlready");
            exit();
        }

        $q1=mysqli_query($con,"SELECT s_fname, s_mname, s_lname FROM t_user where s_id='".$intrvwof."'");
        $n1=  mysqli_fetch_assoc($q1);
        $sfname= $n1['s_fname'];
        $smname= $n1['s_mname'];
        $slname= $n1['s_lname'];

        $intname = $slname .", ". $sfname ." ". $smname;

        $sql  = "INSERT INTO t_usermark VALUES(";
        $sql .= "'" . $intrvwof . "',";
        $sql .= "'" . $intname . "',";
        $sql .= "'" . $txtcourse . "',";
        $sql .= "'" . $txtintrvwGrd . "',";
        $sql .= "'" . $adname . "')";
        
        mysqli_query($con, $sql);

        echo "<script>alert('Interview of " .$intname." is Graded.');
        window.location.replace('admin.php');
        </script>";
        exit();
    }
   
    function scheduleCode(){
        $con = mysqli_connect("localhost", "root", "", "oas");
        $rs1  = mysqli_query($con,"select CONCAT('SCHED',LPAD(RIGHT(ifnull(max(sched_id),'SCHED0000'),5) + 1,5,'0')) from t_schlyr;");
        return mysqli_fetch_array($rs1)[0];
    }
    function fillingCode(){
        $con = mysqli_connect("localhost", "root", "", "oas");
        $rs2  = mysqli_query($con,"select CONCAT('ADMSN',LPAD(RIGHT(ifnull(max(fillingId),'ADMSN0000'),5) + 1,5,'0')) from t_filling;");
        return mysqli_fetch_array($rs2)[0];
    }
    function ursatCode(){
        $con = mysqli_connect("localhost", "root", "", "oas");
        $rs2  = mysqli_query($con,"select CONCAT('ETDAY',LPAD(RIGHT(ifnull(max(ursat_id),'URSAT0000'),5) + 1,5,'0')) from t_ursatday;");
        return mysqli_fetch_array($rs2)[0];
    }
    function ursatroomCode(){
        $con = mysqli_connect("localhost", "root", "", "oas");
        $rs2  = mysqli_query($con,"select CONCAT('EROOM',LPAD(RIGHT(ifnull(max(ursat_id),'URSAT0000'),5) + 1,5,'0')) from t_ursatroom;");
        return mysqli_fetch_array($rs2)[0];
    }
    
    function AdminCode(){
        $con = mysqli_connect("localhost", "root", "", "oas");
        $rs  = mysqli_query($con,"select CONCAT('AD',LPAD(RIGHT(ifnull(max(ad_id),'AD00000'),5) + 1,5,'0')) from t_admin");
        return mysqli_fetch_array($rs)[0];
    }
    function AdminPass(){
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for($i=0;$i<8;$i++){
            $n=rand(0,$alphaLength);
            $pass[]=$alphabet[$n];
        }
        return implode($pass);
    }

    function adminuidExists($con, $txtnameuid, $txteml) {
        $sql = "SELECT * FROM t_admin WHERE ad_username = ? OR ad_eml = ?;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $txtnameuid, $txteml);
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
    function adminemptyInputSignup($txtname, $txtnameuid, $txteml, $txtuserlevel){
        $result;
        if (empty($txtname) ||empty($txtnameuid) || empty($txteml) || empty($txtuserlevel)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }    
    function adminemptyInputDel($txtnameuid){
        $result;
        if (empty($txtnameuid)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }    

    function emptyInputMarks($txtcourse, $txtintrvwGrd){
        $result;
        if (empty($txtcourse) || empty($txtintrvwGrd)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function intExists($con, $intrvwof) {
        $sql = "SELECT * FROM t_usermark WHERE s_id = ?;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $intrvwof);
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

    function emptyInputSy($schlyrstart, $schlyrend){
        $result;
        if (empty($schlyrstart) || empty($schlyrend)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function syExists($con, $schlyrstart, $schlyrend) {
        $sql = "SELECT * FROM t_schlyr WHERE syStart = ? OR syEnd = ?;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $schlyrstart, $schlyrend);
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
    
    function emptyInputAd($a_fillingStart, $a_fillingEnd){
        $result;
        if (empty($a_fillingStart) || empty($a_fillingEnd)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function adExists($con, $txtsid) {
        $sql = "SELECT * FROM t_filling WHERE sched_id = ?;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $txtsid);
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

    function emptyInputHC($r_dDate, $r_appLimit){
        $result;
        if (empty($r_dDate) || empty($r_appLimit)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function hcExists($con, $txtschedid, $r_dayNum) {
        $sql = "SELECT * FROM t_reqpassing WHERE sched_id = ? AND rdayNum = ?;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $txtschedid, $r_dayNum);
        mysqli_stmt_execute($stmt);
    
        $resultDataa = mysqli_stmt_get_result($stmt);
    
        if ($row = mysqli_fetch_assoc($resultDataa)) {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

    function emptyURSATDel($ursatDay, $ursatRoom){
        $result;
        if (empty($ursatDay) && empty($ursatRoom)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    
    function emptyInputExamDay($examDayLimit, $examCampus, $examDayNum, $examDate){
        $result;
        if (empty($examDayLimit) || empty($examCampus) || empty($examDayNum) || empty($examDate)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function examDayExists($con, $txtschedid, $examDayNum, $examCampus) {
        $sql = "SELECT * FROM t_ursatday WHERE sched_id = ? AND eDayNum = ? AND eCampus = ? ;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $txtschedid, $examDayNum, $examCampus);
        mysqli_stmt_execute($stmt);
    
        $resultDataaa = mysqli_stmt_get_result($stmt);
    
        if ($row = mysqli_fetch_assoc($resultDataaa)) {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

    function emptyInputExamRoom($examDayNum, $examCourseRoom, $examRoomNum, $examRoomName, $examRoomTime){
        $result;
        if (empty($examDayNum) || empty($examCourseRoom) || empty($examRoomNum) || empty($examRoomName) || empty($examRoomTime)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function examRoomExists($con, $examDayNum, $examRoomNum, $txtschedid) {
        $sql = "SELECT * FROM t_ursatroom WHERE dayNum = ? AND rRoom = ? AND sched_id = ?;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $examDayNum, $examRoomNum, $txtschedid);
        mysqli_stmt_execute($stmt);
    
        $resultRoom = mysqli_stmt_get_result($stmt);
    
        if ($row = mysqli_fetch_assoc($resultRoom)) {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

    function emptyInputRes($resdate){
        $result;
        if (empty($resdate)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function resExists($con, $txtsid) {
        $sql = "SELECT * FROM t_exam_result WHERE sched_id = ?;";
        $stmt = mysqli_stmt_init($con);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: admin.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $txtsid);
        mysqli_stmt_execute($stmt);
    
        $resultRes = mysqli_stmt_get_result($stmt);
    
        if ($row = mysqli_fetch_assoc($resultRes)) {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
?>
