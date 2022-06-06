<?php
    error_reporting(0);
    $getid= $_GET["id"];

    require 'includes/dbh.inc.php';
    require 'includes/viewform.inc.php';


    $result = mysqli_query($conn,"SELECT * FROM t_docinitialverify WHERE s_id='".$getid."'");      
    while($row = mysqli_fetch_array($result))
    
        {
            $q=mysqli_query($conn,"SELECT rdayNum FROM t_reqpassing WHERE sched_id='".$syId."'");
            $n=  mysqli_fetch_assoc($q);
            $dayNumber= $n['rdayNum'];
            
            $q1=mysqli_query($conn,"SELECT rdDate, rappLimit FROM t_reqpassing WHERE rdayNum='".$row[3]."'");
            $n1=  mysqli_fetch_assoc($q1);
            $reqDDate= $n1['rdDate'];
            $reqLimit= $n1['rappLimit'];
            
            $reqDate = strtotime($reqDDate);
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
    
    <body>
        <form id="admincard" action="reqcard.php?id=<?php echo $getid ?>" method="post">
            <div class="container" style="margin-bottom:20px;width:80%;margin-top:20px;">
                <table class="table table-bordered" style="background-color: #fff380;">
                    <tr style="text-align:center">
                        <td><img src="images/urslogo.png" style="width:180px; height:180px;"></td>
                        <td><br>
                            Republic of the Philippines <br>
                            <b>UNIVERSITY OF RIZAL SYSTEM </b> <br>
                            Binangonan Campus <br>
                            <?php echo $syS ." - ". $syE ?>
                            <br><br>
                            <b>SCHEDULE CARD FOR PASSING REQUIREMENTS</b>
                        </td>
                        <td>
                            <?php
                                $picfile_path ='studentpic/';
                                $result1 = mysqli_query($conn,"SELECT * FROM t_userdoc where s_id='".$getid."'");
                                    
                                while($row1 = mysqli_fetch_array($result1))
                                {                  
                                    $picsrc=$picfile_path.$row1['s_pic'];
                                    
                                    echo "<img src='$picsrc.' class='img-thumbnail' style='width:180px; height:180px;'>";
                                    echo"<div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr style="text-align:center">
                        <td colspan="2"><b> <?php echo $syId ?></b></td>
                        <td>Scheduled by:  <b><?php echo $verifiedby; ?></b></td>
                    </tr>
                    <tr>
                        <td><b> Applicant No.</b></td>
                        <td><b><?php echo $row[0]?></b></td>
                        <td>LRN: <b><?php echo $stlrn ?> </td>
                    </tr>
                    <tr>
                        <td><b> Name </b></td>
                        <?php
                        $q1=mysqli_query($conn,"SELECT fullname FROM t_user where s_id='".$getid."'");
                        $n1=  mysqli_fetch_assoc($q1);
                        $sfname= $n1['fullname'];
                        ?>
                        <td><b><?php echo $sfname  ?></b></td>
                        <td>Username : <b><?php echo $stname ?></td>
                    </tr>
                    <tr>
                        <td><b> Campus: </b></td>
                        <td><b><?php echo $row[2] ?></b></td>
                        <td>Address: <br><b>
                            Dist: Darangan -  (02) 8652 1018<br>
                            Binangonan, Rizal</b><br>
                        </td>
                    </tr>
                    <tr>
                        <td><b> Date: </b></td>
                        <td><b> <?php echo date ('F jS Y', $reqDate); ?></b></td>
                        <td>Day Number: <b><?php echo $row[3] ?></b></td>
                    </tr>
                    

                    <tr>
                        <td><b> Time </b></td>
                        <td><b>9:00 AM - 5:00 PM</b> </td>
                        <td>Limit: <b> <?php echo $reqLimit?></b></td>
                    </tr>
                </table>
                <h2> Instructions to the Applicant</h2>
                <p>
                    1. This Schedule Card must be presented for verification at the time of passing your requirement, along with all the hard copy of requirements.
                    <br><br>
                    2. This Schedule Card is valid only if the applicant's photograph and signature images are <b> legibly printed</b>.
                    Print this on an A4 sized paper using a laser printer preferably a color photo printer.
                    <br><br>
                    3. Applicants should occupy their alloted seats <b>5 minutes before</b> the assigned scheduled time.
                    <br><br>
                    4. Applicants will not be allowed to enter the school if you are wearing improper attire.
                    <br><br>
                    5. Remember to bring this together with all original and photocopy of requirements including the admission form.
                </p>
                <input type="submit" id="print" class="hero-btn red-btn" style='float:right' value="PRINT" onclick="printpage();"> 
                <?php echo "<a href='viewform.php?id=".$getid."'  class='hero-btn red-btn'>BACK</a>" ?>
                <?php
                    }
                ?>
            </div>
        </form>
    </body>
</html>
