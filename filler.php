<?php

    session_start();
    error_reporting(0);
    
    require 'includes/dbh.inc.php';
    $getid= $_GET["id"];

    $q=mysqli_query($conn,"SELECT s_name FROM t_user_data WHERE s_id='$getid'");
    $n=  mysqli_fetch_assoc($q);
    $stname= $n['s_name'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URS | Staff </title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">

        <link type="text/css" rel="stylesheet" href="css/style.css"></link>
        <link type="text/css" rel="stylesheet" href="css/astyle.css"></link>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="container"  style="background-image: linear-gradient(rgba(4,9,20,0.7), rgba(4,9,20,0.7)), url('images/banner.jpeg');">
        <nav>
            <a href="#"><img src="images/ourss.png" alt="" style="width:200px;"></a>
            
            <h3 style="color:#45f3ff;"><br><br> Applicant <?php echo $getid .", " . $stname?>  did not submit application form. </h3><br><br>
            <a href='admin.php' class='hero-btn'  style='color:#fff;margin-left:45%;'>BACK</a>
            
        </nav>
    </body>
    
<!------footer------------>
</html>