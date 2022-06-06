<?php

    $getid= $_GET["id"];

    $qad=mysqli_query($conn,"SELECT ad_name FROM t_admin where ad_id='".$_SESSION['ad']."'");
    $nad=  mysqli_fetch_assoc($qad);
    $adnamee= $nad['ad_name'];

    $qiv=mysqli_query($conn,"SELECT s_checkedBy FROM t_docinitialverify where s_id='$getid'");
    $niv=mysqli_fetch_assoc($qiv);
    $verifiedby= $niv['s_checkedBy'];

    $qup=mysqli_query($conn,"SELECT s_checkedBy FROM t_dochardcopy where s_id='$getid'");
    $nup=mysqli_fetch_assoc($qup);
    $updatedby= $nup['s_checkedBy'];

    $q=mysqli_query($conn,"SELECT s_name FROM t_user_data WHERE s_id='$getid'");
    $n=  mysqli_fetch_assoc($q);
    $stname= $n['s_name'];

    $q1=mysqli_query($conn,"SELECT s_lrn from t_user where s_id='".$getid."'");
    $n1=  mysqli_fetch_assoc($q1);
    $stlrn= $n1['s_lrn'];

    $qq=mysqli_query($conn,"SELECT s_collegeOf, s_intgrade, s_markedBy FROM t_usermark WHERE s_id='$getid'");
    $nn=  mysqli_fetch_assoc($qq);
    $intcourse= $nn['s_collegeOf'];
    $intrating= $nn['s_intgrade'];
    $intby= $nn['s_markedBy'];

    $sta=mysqli_query($conn,"SELECT s_stat FROM t_status WHERE s_id='$getid'");
    $stat=  mysqli_fetch_assoc($sta);
    $stval= $stat['s_stat'];

    $q2=mysqli_query($conn,"SELECT sched_id, syStart, syEnd FROM t_defaultschlyr WHERE id = '1' ");
    $n2=  mysqli_fetch_assoc($q2);
    $syId= $n2['sched_id'];
    $syS= $n2['syStart'];
    $syE= $n2['syEnd'];

    $q3=mysqli_query($conn,"SELECT sched_id, fillingStart, fillingEnd FROM t_filling WHERE sched_id='$syId' ");
    $n3=  mysqli_fetch_assoc($q3);
    $adId= $n3['sched_id'];
    $adS= $n3['fillingStart'];
    $adE= $n3['fillingEnd'];

    $adStart = strtotime($adS);
    $adEnd = strtotime($adE);
        
    $q3=mysqli_query($conn,"SELECT e_result FROM t_exam_result WHERE sched_id='$syId' ");
    $n3=  mysqli_fetch_assoc($q3);
    $resdate= $n3['e_result'];
    $resultdate = strtotime($resdate);
/*  for view documents */

    $data = mysqli_query($conn,"SELECT * FROM t_userdoc ") or
    die(mysqli_error());

    $picfile_path ='studentpic/';
    $docfile_path ='studentdoc/';
    $prooffile_path ='studentproof/';


        