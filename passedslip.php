

<?php
    error_reporting(0);
    $getid= $_GET["id"];

    require 'includes/dbh.inc.php';
    require 'includes/viewform.inc.php';

    
    $q12=mysqli_query($conn,"SELECT ad_name FROM t_admin where ad_userlevel='COORDINATOR'");
    $n12=  mysqli_fetch_assoc($q12);
    $coorName= $n12['ad_name'];

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URS</title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css"></link>
       
        
        <script type="text/javascript">
            function printpage()
            {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
             printButton.style.visibility = 'visible';
             }
        </script>
    </head>
    
    <body style="background-color: #fff; ">
        <form id="admincard" action="passedslip.php?id=<?php echo $getid ?>" method="post">
            <div class="container" style="margin-bottom:20px;margin-top:20px;">
                <div style="width:80%;background-color:#ffdb58;padding:10px;margin-bottom:20px;">
                    <table style="width:100%;text-align:center;border:1px solid #000;">
                        <tr>
                            <td style="width:20%"><img src="images/urslogo.png" alt="" style="width:60px; margin:10px;"></td>
                            <td style="width:60%"><br>
                            Republic of the Philippines <br>
                            <b>UNIVERSITY OF RIZAL SYSTEM </b> <br>
                            Binangonan Campus <br>
                            <?php echo $syS ." - ". $syE ?>
                            </td>
                            <td style="width:20%"><img src="images/ursgiants.png" alt="" style="width:60px; margin:10px;"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><br> OFFICE OF THE STUDENT DEVELOPMENT SERVICES <b>(OSDS)</b><br>
                            <i>Gracing Towards Service and Leadership Excellence </i><br>
                            
                            <p>Telephone No. 6521693</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><h1>PASS SLIP</h1></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $syId ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:left;padding-left:20px;">Applicant Number:</td>
                            <td style="text-align:right;padding-right:20px;"><b> <?php echo $getid?></b> </td>
                        </tr>
                        <tr>
                            <?php
                                $q1=mysqli_query($conn,"SELECT fullname FROM t_user where s_id='".$getid."'");
                                $n1=  mysqli_fetch_assoc($q1);
                                $sfname= $n1['fullname'];
                            ?>
                            <td style="text-align:left;padding-left:20px;">Full Name:</td>
                            <td colspan="2"  style="text-align:right;padding-right:20px;"><b><?php echo $sfname  ?></b> </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding-left:20px;">Course:</td>
                            <td colspan="2"  style="text-align:right;padding-right:20px;">
                                <b>
                                    <?php
                                        $q123=mysqli_query($conn,"SELECT Course FROM nameOfPassers where passedName='".$sfname."'");
                                        $n123=  mysqli_fetch_assoc($q123);
                                        $course= $n123['Course'];
                                        echo $course;
                                    ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><br></td>
                        </tr>
                        <tr >
                            <td colspan="3">
                            <?php
                                $picfile_path ='adminsig/';
                                $result1 = mysqli_query($conn,"SELECT * FROM t_admin where ad_userlevel='COORDINATOR'");
                                    
                                while($row1 = mysqli_fetch_array($result1)){                  
                                    $picsrc=$picfile_path.$row1['ad_sig'];
                                    echo "<img src='$picsrc.' class='img-thumbnail' style='width:80px;'>";
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $coorName ?> <br><i>SDS Coordinator</i></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p>Note: This <b>slip</b> must be present on Orientation.</p></td>
                        </tr>
                    </table>
                </div>
                <input type="submit" id="print" class="hero-btn red-btn" style='float:right' value="PRINT" onclick="printpage();"> 
                <?php echo "<a href='viewform.php?id=".$getid."'  class='hero-btn red-btn'>BACK</a>" ?>
            </div>                   
        </form>
    </body>
</html>
