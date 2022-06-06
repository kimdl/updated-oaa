<?php
    error_reporting(0);
    $adid= $_GET["id"];
    require 'dbh.inc.php';


    $sql  = "UPDATE t_admin SET ad_stat=";
    $sql .= "'Active'";
    $sql .= " WHERE ad_id='" . $adid . "'";
    
    mysqli_query($conn, $sql);

    $q1=mysqli_query($conn,"SELECT ad_name FROM t_admin where ad_id='".$adid."'");
    $n1=  mysqli_fetch_assoc($q1);
    $adname= $n1['ad_name'];

    echo"<script>alert('Officer ".$adname. " Activated.');
    window.location.replace('../admin.php');</script>";
