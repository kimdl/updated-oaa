
<?php
    error_reporting(0);
    $getid= $_GET["id"];

    require 'includes/dbh.inc.php';
    require 'includes/viewform.inc.php';


    $result = mysqli_query($conn,"SELECT * FROM t_dochardcopy WHERE s_id='".$getid."'");      
    while($row = mysqli_fetch_array($result))
    
        {
            $q=mysqli_query($conn,"SELECT eDayNum FROM t_ursatday WHERE sched_id='".$syId."'");
            $n=  mysqli_fetch_assoc($q);
            $edayNumber= $n['eDayNum'];
            
            $q1=mysqli_query($conn,"SELECT eDate, eLimit FROM t_ursatday WHERE eDayNum='".$row[3]."'");
            $n1=  mysqli_fetch_assoc($q1);
            $eDDate= $n1['eDate'];
            $eLimit= $n1['eLimit'];
            
            $eDate = strtotime($eDDate);
            
            $q3=mysqli_query($conn,"SELECT rCourse, rRName, rTime FROM t_ursatroom WHERE dayNum='".$edayNumber."' AND rRoom='". $row[4]. "'");
            $n3=  mysqli_fetch_assoc($q3);
            $rc= $n3['rCourse'];
            $rn= $n3['rRName'];
            $rt= $n3['rTime'];
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
        <form id="admincard" action="adminac.php?id=<?php echo $getid ?>" method="post">
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
                            <b>SCHEDULE CARD FOR ENTRANCE EXAM</b>
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
                        <td>Scheduled by:  <b><?php echo$row[5]  ?></b></td>
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
                        <td>Address: <br>
                        <b>
                            Dist: Darangan -  (02) 8652 1018<br>
                            Binangonan, Rizal</b><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Day Number: <b><?php echo $row[3] ?></b></td>
                        <td><b> Date: <?php echo date ('F jS Y', $eDate); ?></b></td>
                        <td>Limit: <b> <?php echo $eLimit?></b></td>
                    </tr>
                    <tr>
                        <td>Room Number: <b><?php echo $row[4] ?></b></td>
                        <td>Time: <b> <?php echo $rt?></b></td>
                        <td>Course: <b><?php echo $rc ?></b></td>
                    </tr>
                </table>
                <h2> Instructions to the Applicant</h2>
                    <p>
                        1. This URSAT Schedule Card must be presented for verification at the time of examination, along with at least one
                        original(not photocopied or scanned copy) and valid (not expired) photo identification card.
                    </p>
                    
                    <p>
                        2. This URSAT Schedule Card is valid only if the applicants's photograph and signature images are <b> legibly printed</b>.
                        Print this on an A4 sized paper using a laser printer preferably a color photo printer.
                    </p>
                    
                    <p>
                        3. Applicant should occupy their alloted seats <b>20 minutes before</b> the scheduled start of the examination.
                    </p>
                    
                    <p>
                        4. Applicant will not be allowed to enter the examination hall <b>30 minutes</b>
                        after the commencement of the examination.
                    </p>
                    
                    <p>
                        5. Mobile phones or any other Electronic gadgets are NOT ALLOWED inside the examination hall. There may not be any
                        facility for the safe-keeping of your gadget outside the hall, so it may be easier to leave it at your residence.
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
