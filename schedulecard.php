
<?php

    session_start();
    error_reporting(0);
    $id = $_SESSION['user'];

    $con=mysqli_connect("localhost","root","","oas");
    if(!isset($con)){
        die("Database Not Found");
    }

    $q=mysqli_query($con,"SELECT s_name from t_user_data where s_id='".$id."'");
    $n=  mysqli_fetch_assoc($q);
    $stname= $n['s_name'];
    
    $q1=mysqli_query($con,"SELECT s_lrn from t_user where s_id='".$id."'");
    $n1=  mysqli_fetch_assoc($q1);
    $stlrn= $n1['s_lrn'];

    $q2=mysqli_query($con,"SELECT sched_id, syStart, syEnd FROM t_defaultschlyr WHERE id = '1' ");
    $n2=  mysqli_fetch_assoc($q2);
    $syId= $n2['sched_id'];
    $syS= $n2['syStart'];
    $syE= $n2['syEnd'];

    $result = mysqli_query($con,"SELECT * FROM t_docinitialverify WHERE s_id='".$id."'");      
    while($row = mysqli_fetch_array($result))
    
        {
        $q=mysqli_query($con,"SELECT rdayNum FROM t_reqpassing WHERE sched_id='".$syId."'");
        $n=  mysqli_fetch_assoc($q);
        $dayNumber= $n['rdayNum'];
        
        $q1=mysqli_query($con,"SELECT rdDate, rappLimit FROM t_reqpassing WHERE rdayNum='".$row[3]."'");
        $n1=  mysqli_fetch_assoc($q1);
        $reqDDate= $n1['rdDate'];
        $reqLimit= $n1['rappLimit'];
        
        $reqDate = strtotime($reqDDate);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
    
    <body style="background-color: #fff">
        <form id="admincard" action="schedulecard.php" method="post">
            <div class="container" style="margin-bottom:20px;width:80%;">
                <table class="table table-bordered">
                    <tr style="text-align:center">
                        <td><img src="images/urslogo.png" style="width:180px; height:180px;"></td>
                        <td>
                            <h3>UNIVERSITY OF RIZAL SYSTEM</h3>
                            <p>Province of Rizal <br> (02) 8899-67-48 <br>
                            <?php echo $syS ." - " . $syE?>
                            </p>
                            <b>Schedule Card for Passing Requirements</b> 
                        </td>
                        <td>
                            <?php
                                $picfile_path ='studentpic/';
                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                                    
                                while($row1 = mysqli_fetch_array($result1))
                                {                  
                                    $picsrc=$picfile_path.$row1['s_pic'];
                                    
                                    echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                                    echo"<div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr style="text-align:center">
                        <td colspan="3"><b> <?php echo $syId ?></b></td>
                    </tr>
                    <tr>
                        <td><b> Applicant No.</b></td>
                        <td><b><?php echo $row[0] ?></b></td>
                        <td>LRN: <b><?php echo $stlrn ?> </b></td>
                    </tr>
                    <tr>
                        <td><b> Name: </b></td>
                        <?php
                        $q1=mysqli_query($con,"SELECT s_fname, s_mname, s_lname FROM t_user where s_id='".$id."'");
                        $n1=  mysqli_fetch_assoc($q1);
                        $sfname= $n1['s_fname'];
                        $smname= $n1['s_mname'];
                        $slname= $n1['s_lname'];
                        ?>
                        <td><b><?php echo $sfname ." ". $smname ." ". $slname ?></b></td>
                        <td>Username : <b><?php echo $stname ?></b></td>
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
                        <td><b> Time: </b></td>
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

                
            </div>
        </form>
        <?php }?>
    </body>
</html>
