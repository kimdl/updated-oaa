<?php
    error_reporting(0);
    $getid= $_GET["id"];
    require 'dbh.inc.php';

    $sql  = "UPDATE t_status SET s_stat=";
    $sql .= "'Pending'";
    $sql .= " WHERE s_id='" . $getid . "'";
    
    mysqli_query($conn, $sql);

    echo"<script>alert('Applicant ".$getid. " Restored.');
    window.location.replace('../arch.php');</script>";
