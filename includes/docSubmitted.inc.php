<?php

session_start();
error_reporting(0);

$conn=mysqli_connect("localhost","root","","oas");
 
$getid= $_GET["id"];

$qad=mysqli_query($conn,"SELECT ad_name FROM t_admin where ad_id='".$_SESSION['ad']."'");
$nad=  mysqli_fetch_assoc($qad);
$adnamee= $nad['ad_name'];

$reqCampusPassing=$_POST["reqCampusPassing"];
$dayAssigned=$_POST["dayAssigned"];

if(isset($_REQUEST["scNotVerified"])){
    $doc=$_POST["doc"];
    $b =implode(', ',$doc);

    $sql  = "INSERT INTO t_docinitialverify VALUES(";
    $sql .= "'" . $getid . "',";
    $sql .= "'" . $b . "',";
    $sql .= "' NA ',";
    $sql .= "' NA ',";
    $sql .= "'". $adnamee ."')";

    $sql0 = "UPDATE t_docinitialverify SET 
    s_id = '$getid', 
    s_documentsPassed = '$b',
    s_Campus = 'NA', 
    s_Day = 'NA',
    s_checkedBy = '$adnamee'
    WHERE s_id='$getid'";

    $sql1  = "UPDATE t_status SET
    s_stat= 'Not Verified'
    WHERE s_id='".$getid."'";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql0);
    mysqli_query($conn, $sql1);

    echo "
    <script>alert('Documents Recorded. Applicant not verified.');
    window.location.replace('../viewform.php?id=".$getid."');
    </script>";
}
if(isset($_REQUEST["scVerified"])){
    $doc=$_POST["doc"];
    $b =implode(', ',$doc);
    
    $sql  = "INSERT INTO t_docinitialverify VALUES(";
    $sql .= "'" . $getid . "',";
    $sql .= "'" . $b . "',";
    $sql .= "'" . $reqCampusPassing . "',";
    $sql .= "'" . $dayAssigned . "',";
    $sql .= "'" . $adnamee . "')";
    
    $sql0 = "UPDATE t_docinitialverify SET 
    s_id = '$getid', 
    s_documentsPassed = '$b',
    s_Campus = '$reqCampusPassing', 
    s_Day = '$dayAssigned',
    s_checkedBy = '$adnamee'
    WHERE s_id='$getid'";

    $sql1  = "UPDATE t_status SET
    s_stat= 'Verified'
    WHERE s_id='".$getid."'";
    
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql0);
    mysqli_query($conn, $sql1);
    echo "
    <script>alert('Initial Requirements Complete and Verified. Requirement Day Scheduled.');
    window.location.replace('../viewform.php?id=".$getid."');
    </script>";
}

$campusTestingCenter=$_POST["campusTestingCenter"];
$eDayAssigned=$_POST["eDayAssigned"];
$eRoomAssigned=$_POST["eRoomAssigned"];

if(isset($_REQUEST["hcIncomplete"])){
    $hc=$_POST["hc"];
    $c =implode(', ',$hc);

    $sql  = "INSERT INTO t_dochardcopy VALUES(";
    $sql .= "'" . $getid . "',";
    $sql .= "'" . $c . "',";
    $sql .= "'NA',";
    $sql .= "'NA',";
    $sql .= "'NA',";
    $sql .= "'".$adnamee."')";

    $sql0 = "UPDATE t_dochardcopy SET 
    s_id = '$getid', 
    s_hcdocumentsPassed = '$c',
    s_eCampusCenter = 'NA', 
    s_eDay = 'NA',
    s_eRoom  = 'NA',
    s_checkedBy = '$adnamee'
    WHERE s_id='$getid'";

    $sql1  = "UPDATE t_status SET
    s_stat= 'Incomplete'
    WHERE s_id='".$getid."'";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql0);
    mysqli_query($conn, $sql1);

    echo "
    <script>alert('Requirements Recorded as Incomplete.');
    window.location.replace('../viewform.php?id=".$getid."');
    </script>";
}
if(isset($_REQUEST["hcComplete"])){
    $hc=$_POST["hc"];
    $c =implode(', ',$hc);
    
    $sql  = "INSERT into t_dochardcopy VALUES(";
    $sql .= "'" . $getid . "',";
    $sql .= "'" . $c . "',";
    $sql .= "'" . $campusTestingCenter . "',";
    $sql .= "'" . $eDayAssigned . "',";
    $sql .= "'" . $eRoomAssigned . "',";
    $sql .= "'" . $adnamee . "')";
    
    $sql0 = "UPDATE t_dochardcopy SET 
    s_id = '$getid', 
    s_hcdocumentsPassed = '$c',
    s_eCampusCenter = '$campusTestingCenter', 
    s_eDay = '$eDayAssigned ',
    s_eRoom  = '$eRoomAssigned ',
    s_checkedBy = '$adnamee'
    WHERE s_id='$getid'";

    $sql1  = "UPDATE t_status SET
    s_stat= 'Complete'
    WHERE s_id='".$getid."'";
    
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql0);
    mysqli_query($conn, $sql1);
    echo "
    <script>alert('Requirements Complete. URSAT Scheduled.');
    window.location.replace('../viewform.php?id=".$getid."');
    </script>";
}
else {
    echo "<script>alert('Error.');
    window.location.replace('../viewform.php?id=".$getid."error');
    </script>";
}
?>